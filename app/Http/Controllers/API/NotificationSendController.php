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
            $field = $request->query("field");
            $type = $request->query("type");

            if($type == 'question') {
                $field = $request->query("field");

                Log::info('Incoming field:', ['field' => $field]);
            
                $users = User::whereNotNull('fcm_token')
                    ->where(function ($query) use ($field) {
                        $query->where('field_of_interest', $field) // exact match
                              ->orWhere('field_of_interest', 'LIKE', "%$field%"); // fallback
                    })
                    ->get();
            
                Log::info('Matched users:', [
                    'count' => $users->count(),
                    'fields' => $users->pluck('field_of_interest'),
                ]);
            
                foreach ($users as $userItem) {
                    try {
                        $fcm->sendToToken(
                            $userItem->fcm_token,
                            $title,
                            $body,
                            ['type' => 'question']
                        );
                    } catch (\Throwable $e) {
                        Log::error($e->getMessage());
                    }
                }
            } else {
                $user = $user->where('id', $request->query('id'));
            
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
