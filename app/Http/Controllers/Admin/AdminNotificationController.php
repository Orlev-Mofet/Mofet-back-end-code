<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

use App\Models\AdminNotification;
use App\Models\User;

use Firebase\JWT\JWT;

class AdminNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $notifications = AdminNotification::whereNotNull("content");
        if( $request->query("content") ) {
            $notifications = $notifications->where("content", "LIKE", "%".$request->query("content")."%");
        }
        if( $request->query("time") ) {
            $notifications = $notifications->where("time", "LIKE", "%".$request->query("time")."%");
        }

        $notifications = $notifications->orderBy("time", "DESC")->paginate(10);

        return view("admin.pages.notifications.index", compact("notifications"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.notifications.create");
    }

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


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'content' => 'required',
        ]);
    
        try {
    
            $serviceAccount = json_decode(
                file_get_contents(storage_path('app/firebase/service.json')),
                true
            );
    
            $accessToken = $this->getAccessToken($serviceAccount);
    
            $url = 'https://fcm.googleapis.com/v1/projects/' . $serviceAccount['project_id'] . '/messages:send';
    
            $tokens = User::whereNotNull('fcm_token')
                ->pluck('fcm_token')
                ->all();
    
            $success = 0;
            $fail = 0;
    
            foreach ($tokens as $token) {
    
                $payload = [
                    "message" => [
                        "token" => $token,
                        "notification" => [
                            "title" => "admin_alarm",
                            "body" => $request->content,
                        ],
                        "data" => [
                            "type" => "admin_alarm"
                        ]
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
    
                $response = json_decode($result, true);
    
                if (isset($response['error'])) {
    
                    $fail++;
    
                    $errorCode = $response['error']['status'] ?? null;

                    if ($errorCode === 'NOT_FOUND' || $errorCode === 'UNREGISTERED') {
                        User::where('fcm_token', $token)->update(['fcm_token' => null]);
                    }
    
                    Log::error(['FCM error', $response]);
    
                } else {
                    $success++;
                }
    
                curl_close($ch);
            }
    
            Log::info([
                'push_result',
                'success' => $success,
                'fail' => $fail
            ]);
    
      
            $not = new AdminNotification;
            $not->content = $request->content;
            $not->time = now();
            $not->save();
    
            return redirect('admin/admin_notification');
    
        } catch (\Throwable $th) {
    
            Log::error($th->getMessage());
    
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
