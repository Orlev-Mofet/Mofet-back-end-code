<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Firebase\JWT\JWT;
use App\Models\User;


class NotificationSendController extends Controller
{
    private function getAccessToken($serviceAccount)
    {
        $now = time();

        $payload = [
            "iss" => $serviceAccount['client_email'],
            "scope" => "https://www.googleapis.com/auth/firebase.messaging",
            "aud" => "https://oauth2.googleapis.com/token",
            "iat" => $now,
            "exp" => $now + 3600,
        ];

        $jwt = JWT::encode($payload, $serviceAccount['private_key'], 'RS256');

        $ch = curl_init("https://oauth2.googleapis.com/token");

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            "grant_type" => "urn:ietf:params:oauth:grant-type:jwt-bearer",
            "assertion" => $jwt,
        ]));

        $response = json_decode(curl_exec($ch), true);

        return $response['access_token'];
    }

    public function sendPushNotification(Request $request)
    {
        try {

            $serviceAccount = json_decode(file_get_contents(storage_path('app/firebase/service.json')), true);

            $accessToken = $this->getAccessToken($serviceAccount);

            $url = 'https://fcm.googleapis.com/v1/projects/' . $serviceAccount['project_id'] . '/messages:send';

            $user = User::whereNotNull('fcm_token');
            $sort = $request->query('sort');

            $body = "New Push Notification";
            $dataPayload = [];

            if ($sort == "question_Mathematics" || $sort == "question_Physics") {
                $user = $user->whereNot('id', $request->query('id'));

                $dataPayload = [
                    "question_id" => (string)$request->query('question_id'),
                    "locale" => (string)$request->query('locale'),
                ];
            } else if ($sort == "answer") {
                $user = $user->whereNot('id', $request->query('id'));

                $dataPayload = [
                    "question_id" => (string)$request->query('question_id'),
                    "locale" => (string)$request->query('locale'),
                    "question_user_id" => (string)$request->query('question_user_id'),
                    "field" => (string)$request->query('field'),
                ];
            } else if ($sort == "abuse_question" || $sort == "abuse_answer") {
                $user = $user->where('id', $request->query('user_id'));
            }

            $tokens = $user->pluck('fcm_token')->all();

            $responses = [];

            foreach ($tokens as $token) {

                $payload = [
                    "message" => [
                        "token" => $token,
                        "notification" => [
                            "title" => $sort,
                            "body" => $body,
                        ],
                        "data" => $dataPayload
                    ]
                ];

                $ch = curl_init($url);

                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Authorization: Bearer " . $accessToken,
                    "Content-Type: application/json"
                ]);

                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $result = curl_exec($ch);

                $responses[] = json_decode($result, true);

                curl_close($ch);
            }

            return response()->json([
                "status" => "success",
                "responses" => $responses
            ]);

        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json([
                "status" => "error"
            ], 422);
        }
    }
}
