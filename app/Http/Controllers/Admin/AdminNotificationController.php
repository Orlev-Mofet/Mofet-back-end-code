<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

use App\Models\AdminNotification;
use App\Models\User;

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
    public function store(Request $request)
    {
        request()->validate([
            'content' => 'required',
        ]);

        $url = 'https://fcm.googleapis.com/v1/projects/mofet-f354c/messages:send';

        $user = User::whereNotNull('fcm_token');

        $FcmToken = $user->pluck('fcm_token')->all();

        $serverKey = env("FIREBASE_SERVER_KEY");
    
        $data = [
            "token" => $FcmToken,
            "notification"  => [
                "title"     => "admin_alarm",
                "body"      => $request->content, 
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

        Log::debug(["Curl result: ", $request->content, $FcmToken, $result]);

        // $twilio = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));

        // try {
        //     $users = $user->get();

        //     foreach ($users as $key => $user) {
                
        //         $message = $twilio->messages->create(
        //             $user->phone_code.$user->phone_number,
        //             [
        //                 'from' => env('TWILIO_PHONE_NUMBER'),
        //                 'body' => "Administrator notification : ".$request->content,
        //             ]
        //         );
        //     }
        // } catch (\Throwable $th) {
        //     Log::debug([ "send twilio message error =======================", $th->getMessage() ] );
        // }
        

        if ($result === FALSE) {
            return redirect()->back();
        } else {

            $not                = new AdminNotification;
            $not->content       = $request->content;
            $not->time          = date('Y-m-d H:i:s');
            $not->save();
    
            return redirect('admin/admin_notification');
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
