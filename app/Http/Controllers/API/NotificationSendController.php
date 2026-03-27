<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Services\FcmService;
use App\Models\User;


class NotificationSendController extends Controller
{
    public function sendPushNotification(Request $request, FcmService $fcm) {

        try {
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

            $tokens = $user->pluck('fcm_token')->toArray();

            foreach ($tokens as $token) {
                try {
                    $fcm->sendToToken(
                        $token,
                        $request->query("sort"),
                        $body,
                        ['type' => 'push']
                    );
                } catch (\Throwable $e) {
                    Log::error($e->getMessage());
                }
            }

            return response()->json([
                'data' => null, 
                "status" => "success"
            ], 200);
            
        } catch (\Throwable $th) {
            Log::debug(["catch Throwable: ", $th->getMessage()]);
            return response()->json([
                "status" => "error"
            ], 422);
        }
       
    }
}
