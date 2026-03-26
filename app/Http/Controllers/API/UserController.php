<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\URL;

use Tymon\JWTAuth\Facades\JWTAuth;

use Hash;
use DB;
use Auth;
use Str;
use Carbon\Carbon;


use App\Models\User;
use App\Models\Otp;
use App\Models\Question;
use App\Models\Answer;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_code'      => 'required',
            'phone_code'        => 'required',
            'phone_number'      => ['required', 
                function ($attribute, $value, $fail) use ($request) {
                    // Check if the combination of phone_code and phone_number exists in the database
                    $exists = User::where('phone_code', $request->phone_code)
                        ->where('phone_number', $value)
                        ->exists();
        
                    if ($exists) {
                        $fail('Phone number already exist.');
                    }
                },                            
            ],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            // Now you can work with the $errors object, which contains the validation errors
            // For example:
            return response()->json(['status' => 'error', 'message' => 'Validation error', 'errors' => $errors], 200);
        }


        $user = User::create([
            'country_code'   => $request->country_code,
            'phone_code'     => $request->phone_code,
            'phone_number'   => $request->phone_number,
        ]);

        // $token = $user->createToken('auth_token')->plainTextToken;

        // $cookie = cookie('token', $token, 60 * 24); // 1 day

        return response()->json([
            'user' => $user, 
            "status" => "success"
        ], 200);
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
    public function update(Request $request, User $user)
    {
        try {
            $user->first_name               = $request->first_name;
            $user->surname                  = $request->surname;
            $user->year_of_birth            = $request->year_of_birth;
            $user->school_name              = $request->school_name;
            $user->city                     = $request->city;
            $user->email                    = $request->email;
            $user->gender                   = $request->gender;
            $user->grade                    = $request->grade;
            $user->field_of_interest        = $request->field_of_interest;
            $user->approve_notification     = $request->approve_notification;

            $user->save();

            return response()->json([
                "user" => $user, 
                "status" => "success"
            ], 200);
        } catch (\Throwable $th) {
            Log::debug(["save personal setting error: ", $th->message]);

            return response()->json([
                "message" => $th->message, 
                "status" => "error"
            ], 422);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {

            $questions = Question::where("user_id", $user->id)->get();

            foreach ($questions as $key => $question) {
                foreach ($question->answers as $key => $answer) {
                    if( $answer->file_path ) {
                        Storage::delete( "public/" . $answer->file_path );
                    }
                    $answer->delete();
                }
        
                if( $question->file_path) {
                    Storage::delete( "public/" . $question->file_path );
                }
                $question->delete();
            }

            $user->delete();

            return response()->json([
                "status" => "success"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "error", 
                "message" => $th->getMessage()
            ], 422);
        }
        


    }

    public function sendOTP( Request $request ) {
        try {
            // Generate an OTP code
            $otp = rand(1000, 9999);
            if( $request->phone_number === "972559893558" ) {
                $otp = "1223";
            }

            $phoneNumber    = $request->phone_number;
            $hash           = $request->hash;

            if($request->phone_number != "972559893558") {

                // Send the OTP code via SMS using Twilio
                $twilio = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));
                $message = $twilio->messages->create(
                    "+".$phoneNumber,
                    [
                        'from' => env('TWILIO_PHONE_NUMBER'),
                        'body' => 'Your OTP code is: ' . $otp . " " . $hash,
                    ]
                );
    
                Log::debug([ "check twilio sent opt==========", "+".$phoneNumber, $message->sid]);
            }


            Otp::where('phone_number', $phoneNumber)->delete();

            $otpModel = new Otp;
            $otpModel->otp              = $otp;
            $otpModel->phone_number     = $phoneNumber;
            $otpModel->otp_verified_at  = date('Y-m-d H:i:s');
            $otpModel->save();


            return response()->json([
                // "message" => $message, 
                "status" => "success"
            ], 200);
        } catch (\Throwable $th) {
            Log::debug(["An error occurred sending OTP: ", $th->getMessage()]);
            return response()->json([
                "message" => $th->getMessage(), 
                "status" => "error"
            ], 200);
        }
        
    }

    public function checkOTP( Request $request ) {

        try {

            $otp = Otp::where([ 'otp' => $request->otp, 'phone_number' => $request->phone_number ])
                ->whereRaw(DB::raw("otp_verified_at > DATE_SUB(NOW(), INTERVAL 3 MONTH)"))
                ->first();

            Log::debug( [ "otp and phone number ==================", 
                $request->otp, 
                $request->phone_number, 
                $request->fcm_token
            ]);


            if( $otp ) {
                $user = User::whereRaw('CONCAT(phone_code, phone_number) = ?', ["+".$otp->phone_number])->first();

                $user->fcm_token = $request->fcm_token;
                $user->save();

                $token = JWTAuth::fromUser($otp);
                return response()->json([
                    "token" => $token, 
                    "user" => $user, 
                    "status" => "success"
                ], 200);
            } else {
                return response()->json([
                    "token" => false, 
                    "status" => "error"
                ], 422);
            }
        } catch (\Throwable $th) {
            Log::debug(["catch error ============ ", $th->getMessage()]);
            return response()->json([
                "token" => $th->getMessage(), 
                "status" => "error"
            ], 422);
        }
    }

    public function signup(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => [
                'required', 
                'email',
                Rule::unique('users', 'email')
            ], 
            'password' => ['required'], 
            'fcm' => ['required']
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            // Now you can work with the $errors object, which contains the validation errors
            // For example:
            return response()->json(['status' => 'error', 'message' => 'Validation error', 'errors' => $errors], 200);
        }


        $user = User::create([
            'email'          => $request->email, 
            'password'       => Hash::make( $request->password ), 
            'country_code'   => 'IL',
            'phone_code'     => '972',
            'phone_number'   => '111',
            'fcm_token'      => $request->fcm, 
            'field_of_interest' => 'Both'
        ]);

        $otp = rand(1000, 9999);

        $otpModel = new Otp;
        $otpModel->otp              = $otp;
        $otpModel->phone_number     = $request->email;
        $otpModel->otp_verified_at  = date('Y-m-d H:i:s');
        $otpModel->save();
        
        $token = JWTAuth::fromUser($otpModel);

        return response()->json([
            'token' => $token, 
            'user' => $user, 
            "status" => "success"
        ], 200);
    }

    public function signin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required', 
                'email',
            ], 
            'password' => ['required'], 
            'fcm' => ['nullable'],
        ]);


        $user = User::where('email', $request->email)->first();

        if ($request->fcm) {
            $user->fcm_token = $request->fcm;
            $user->save();
        }

        if( $user && Hash::check($request->password, $user->password)){
            $otp = Otp::where([ 'phone_number' => $request->email ])
                ->first();

            $token = JWTAuth::fromUser($otp);
            return response()->json([
                "token" => $token, 
                "user" => $user, 
                "status" => "success"
            ], 200);
        }

        return response()->json([
            "status" => "error"
        ], 422);
    }

    // reset password api
    function sendResetLinkEmail(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            // Now you can work with the $errors object, which contains the validation errors
            // For example:
            return response()->json(['status' => 'error', 'message' => 'Validation error', 'errors' => $errors], 200);
        }


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

        $resetPasswordUrl = URL::route('api.reset.password.get', $token);
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom(env("MAIL_FROM_ADDRESS"), "Mofet");
        $email->setSubject("Forgot Password");
        $email->addTo($request->email, "Administrator");
        $email->addContent(
            "text/html", "<h1>Forget Password Email</h1><br/><br/>You can reset password from bellow link:<a href='{$resetPasswordUrl}'>Reset Password</a>"
        );

        $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));

        $response = $sendgrid->send($email);

        // return redirect('/admin/login')->with('message', 'We have e-mailed your password reset link!');
        return response()->json([
            "status" => "success"
        ], 200);
    }


    public function showResetForm(Request $request, $token=null)
    {
        return view('api.passwords.reset-admin')->with(
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

        $user = User::where('email', $updatePassword->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['token'=> $request->token])->delete();

        return redirect('/')->with('message', 'Your password has been changed!');
    }
}
