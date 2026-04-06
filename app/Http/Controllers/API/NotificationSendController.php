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
            $body = $request->query("body");
            $title = $request->query("title");
            
            $user = $user->where('id', $request->query('user_id'));

            $tokens = $user->pluck('fcm_token')->toArray();

            foreach ($tokens as $token) {
                try {
                    $fcm->sendToToken(
                        $token,
                        $title,
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
