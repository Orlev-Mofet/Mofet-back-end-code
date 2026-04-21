<?php

namespace App\Http\Services;

use Google\Auth\Credentials\ServiceAccountCredentials;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FcmService
{
    private string $projectId;
    private string $credentialsPath;

    public function __construct()
    {
        $this->credentialsPath = storage_path('app/firebase/service.json');
        $json = json_decode(file_get_contents($this->credentialsPath), true);

        $this->projectId = $json['project_id'];
    }

    private function getAccessToken(): string
    {
        $credentials = new ServiceAccountCredentials(
            ['https://www.googleapis.com/auth/firebase.messaging'],
            json_decode(file_get_contents($this->credentialsPath), true)
        );

        $token = $credentials->fetchAuthToken();

        if (!isset($token['access_token'])) {
            throw new \Exception('Cannot get access token');
        }

        Log::info($token['access_token']);

        return $token['access_token'];
    }

    public function sendToTopic(string $topic, array $data = [])
{
    $accessToken = $this->getAccessToken();

    $url = "https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send";

    $payload = [
        'message' => [
            'topic' => $topic,

            'data' => $data,

            'android' => [
                'priority' => 'HIGH',
            ],

            'apns' => [
                'headers' => [
                    'apns-priority' => '5',
                ],
                'payload' => [
                    'aps' => [
                        'content-available' => 1,
                    ],
                ],
            ],
        ],
    ];

    $response = Http::withToken($accessToken)
        ->post($url, $payload);

    if (!$response->successful()) {
        throw new \Exception('FCM Error: ' . $response->body());
    }

    return $response->json();
}

    public function sendToToken(string $fcmToken, string $title, string $body, array $data = [])
    {
        $accessToken = $this->getAccessToken();

        $url = "https://fcm.googleapis.com/v1/projects/{$this->projectId}/messages:send";

        $payload = [
            'message' => [
                'token' => $fcmToken,
                'notification' => [
                    'title' => $title,
                    'body' => $body,
                ],
                'data' => $data,
        
                'android' => [
                    'priority' => 'HIGH',
                    'notification' => [
                        'channel_id' => 'default',
                        'sound' => 'default',
                    ],
                ],
        
                'apns' => [
                    'headers' => [
                        'apns-priority' => '10',
                    ],
                    'payload' => [
                        'aps' => [
                            'sound' => 'default',
                        ],
                    ],
                ],
            ],
        ];

        $response = Http::withToken($accessToken)
            ->post($url, $payload);

        if (!$response->successful()) {
            throw new \Exception('FCM Error: ' . $response->body());
        }

        return $response->json();
    }
}