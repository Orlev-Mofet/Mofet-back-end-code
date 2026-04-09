<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\AdminNotification;
use App\Models\User;

use App\Http\Services\FcmService;

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

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, FcmService $fcm)
    {
        $request->validate([
            'content' => 'required',
        ]);
    
        $tokens = User::whereNotNull('fcm_token')
        ->orderBy('created_at', 'desc')
            ->pluck('fcm_token')
            ->toArray();
    
        $success = 0;
        $fail = 0;
    
        foreach ($tokens as $token) {
            try {
                $fcm->sendToToken(
                    $token,
                    'Mofet',
                    $request->content,
                    ['type' => 'admin_alarm']
                );
    
                $success++;
    
            } catch (\Throwable $e) {
    
                $fail++;
    
                $message = $e->getMessage();
    
                $response = json_decode($message, true);
    
                $errorCode = $response['error']['status'] ?? null;
    
                if (in_array($errorCode, ['NOT_FOUND', 'UNREGISTERED'])) {
                    User::where('fcm_token', $token)
                        ->update(['fcm_token' => null]);
                }
    
                Log::error('FCM error', [
                    'token' => $token,
                    'error' => $message
                ]);
            }
        }
    
        Log::info('push_result', [
            'success' => $success,
            'fail' => $fail
        ]);
    
        AdminNotification::create([
            'content' => $request->content,
            'time' => now(),
        ]);
    
        return redirect('admin/admin_notification');
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
