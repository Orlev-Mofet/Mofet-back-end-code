<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use App\Models\ContactUs;
use App\Models\Constant;
use App\Models\User;

use App\Mail\ContactUsMail;

use Mail;

class ContactUsController extends Controller
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
        try {

            $constant = Constant::where('key', 'contact_mail')->first();
            $user = User::where("id", $request->user_id)->first();

            $contact_mail = $constant->value;

            $validator = Validator::make($request->all(), [
                'content'           => ['required'],
                'user_id'           => ['required', 'exists:users,id'], 
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                // Now you can work with the $errors object, which contains the validation errors
                // For example:
                return response()->json(['status' => 'error', 'message' => 'Validation error', 'errors' => $errors], 422);
            }

            $content = $request->content;
            $userData = $user->first_name . " ( " . $user->school_name . " " . $user->city . " ) ";
    
            $email = new \SendGrid\Mail\Mail(); 
            $email->setFrom(env("MAIL_FROM_ADDRESS"), "Contact Us");
            $email->setSubject("Mofet Contact Us");
            $email->addTo($contact_mail, "Administrator");
            $email->addContent(
                "text/html", "<strong>From : $userData</strong><br/><br/><pre>$content</pre>"
            );

            $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
    
            $response = $sendgrid->send($email);

            $contactUs = ContactUs::create([
                'user_id'       => $request->user_id, 
                'content'       => $request->content, 
                'time'          => date("Y-m-d H:i:s")
            ]);

            return response()->json([
                'contactUs' => $contactUs, 
                "status" => "success"
            ], 200);

        } catch (\Throwable $th) {
            //throw $th;
            Log::debug([ "contact us catch =======================", $th->getMessage() ] );
            return response()->json([
                "message" => $th->getMessage(), 
                "status" => "error"
            ], 422);
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

    public function sendMail() {
        // If you're using Composer (recommended)
        // Comment out the above line if not using Composer
        // require("<PATH TO>/sendgrid-php.php");
        // If not using Composer, uncomment the above line and
        // download sendgrid-php.zip from the latest release here,
        // replacing <PATH TO> with the path to the sendgrid-php.php file,
        // which is included in the download:
        // https://github.com/sendgrid/sendgrid-php/releases

        // $email = new \SendGrid\Mail\Mail(); 
        // $email->setFrom("mofetshay@gmail.com", "Example User");
        // $email->setSubject("Sending with SendGrid is Fun");
        // $email->addTo("climax.mgc@gmail.com", "Example User");
        // $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        // $email->addContent(
        //     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        // );
        // $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        // try {
        //     $response = $sendgrid->send($email);
        //     print $response->statusCode() . "\n";
        //     print_r($response->headers());
        //     print $response->body() . "\n";
        // } catch (Exception $e) {
        //     Log::debug($e->getMessage());
        //     echo 'Caught exception: '. $e->getMessage() ."\n";
        // }
    }
}
