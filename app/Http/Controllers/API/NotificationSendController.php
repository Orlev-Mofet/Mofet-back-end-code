<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\User;


class NotificationSendController extends Controller
{
    public function sendPushNotification(Request $request) {

        try {
            
            // $url = 'https://fcm.googleapis.com/fcm/send';
            $url = 'https://fcm.googleapis.com/v1/projects/mofet-f354c/messages:send';

            $user = User::whereNotNull('fcm_token');
            $body = "New Push Notification";

            $sort = $request->query('sort');
            if( $sort == "question_Mathematics" || $sort == "question_Physics" ) {
                $user = $user->whereNot('id', $request->query('id'));
                $body = json_encode(array("question_id" => $request->query('question_id'), 'locale' => $request->query('locale')));
            } else if( $sort == "answer"  ) {
                $user = $user->whereNot('id', $request->query('id'));
                $body = json_encode(array(
                    "question_id" => $request->query('question_id'), 
                    'locale' => $request->query('locale'), 
                    'question_user_id' => $request->query('question_user_id'), 
                    'field' => $request->query('field'), 
                ));
            } else if ($sort == "abuse_question") {
                $user = $user->where('id', $request->query('user_id'));
            } else if ($sort == "abuse_answer") {
                $user = $user->where('id', $request->query('user_id'));
            }

            $FcmToken = $user->pluck('fcm_token')->all();

            $serverKey = env("FIREBASE_SERVER_KEY");
        
            $data = [
                "token" => $FcmToken,
                "notification" => [
                    "title" => $request->query("sort"),
                    "body" => $body, 
                ]
            ];
            $encodedData = json_encode($data);
        
            $headers = [
                'Authorization: Bearer' . $serverKey,
                'Content-Type: application/json',
            ];
        
            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            // Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
            // Execute post
            $result = curl_exec($ch);
            Log::debug(["Curl result: ", $request->query("sort"), $FcmToken, $result]);

            if ($result === FALSE) {
                return response()->json([
                    "status" => "error"
                ], 422);
            } else {
                return response()->json([
                    'data' => $result, 
                    "status" => "success"
                ], 200);
            }
        } catch (\Throwable $th) {
            Log::debug(["catch Throwable: ", $th->getMessage()]);
            return response()->json([
                "status" => "error"
            ], 422);
        }
       
    }
}
