<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\URL;

use Mail;
use Password;
use DB;
use Str;
use Hash;
use Session;
use Carbon\Carbon;

use App\Models\Admin;


class AdminForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    public function __construct()
    {
        // $this->middleware('guest:admin');
    }

    protected function broker(){
        return Password::broker('admins');
    }
    public function showLinkRequestForm()
    {
        return view('admin.auth.passwords.admin-reset-password');
    }

    function sendResetLinkEmail(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
          ]);

        // Mail::send('admin.auth.passwords.forgetPassword', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });

        $resetPasswordUrl = URL::route('reset.password.get', $token);
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom(env("MAIL_FROM_ADDRESS"), "Mofet");
        $email->setSubject("Forgot Password");
        $email->addTo($request->email, "Administrator");
        $email->addContent(
            "text/html", "<h1>Forget Password Email</h1><br/><br/>You can reset password from bellow link:<a href='{$resetPasswordUrl}'>Reset Password</a>"
        );

        $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));

        $response = $sendgrid->send($email);

        return redirect('/admin/login')->with('message', 'We have e-mailed your password reset link!');
    }


    public function showResetForm(Request $request, $token=null)
    {
        return view('admin.auth.passwords.reset-admin')->with(
            ['token' => $token]
        );
    }

    function resetPassword(Request $request, $token = null) {
        $request->validate([
            'token' => 'required|exists:password_reset_tokens',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
            'token' => $request->token
            ])
            ->first();

        $user = Admin::where('email', $updatePassword->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['token'=> $request->token])->delete();

        return redirect('/admin/login')->with('message', 'Your password has been changed!');
    }
}
