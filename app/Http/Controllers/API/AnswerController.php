<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


use App\Models\User;
use App\Models\Answer;
use App\Models\Question;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AnswerController extends Controller
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

            $validator = Validator::make($request->all(), [
                'answer'            => ['required'],
                'user_id'           => ['required', 'exists:users,id'], 
                'question_id'       => ['required', 'exists:questions,id'], 
                'locale'            => ["required"], 
                'field'             => ["required"]
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                // Now you can work with the $errors object, which contains the validation errors
                // For example:
                return response()->json(['status' => 'error', 'message' => 'Validation error', 'errors' => $errors], 422);
            }

            $filename = "";
            $path = "";
            $originalFileName = "";
            if ($request->hasFile('file')) {
                $fileValidator = Validator::make($request->all(), [
                    'file' => 'file|mimes:mp4,mp3,wav,jpg,jpeg',
                ]);
                if ($fileValidator->fails()) {
                    $errors = $fileValidator->errors();
                    return response()->json(['status' => 'error', 'message' => 'Validation error', 'errors' => $errors], 422);
                }
                $file = $request->file('file');
                $originalFileName = $request->file('file')->getClientOriginalName();
                $filename = auth()->user()->id . time() . '.' . $request->file('file')->extension();
                $path = $file->storeAs('answer', $filename, 'public');

                // Resize the image
                if( $request->fileSort == "image" ) {
                    $manager = new ImageManager(new Driver());

                    $image = $manager->read( $file );
                    $size = $image->size();
                    $width = $size[1]->x();
                    $height = $size[2]->y();
                    $rate = $height / 300;

                    $image->resize($width / $rate * -1, 300);
                    // encode edited image
                    $encoded = $image->toJpg();

                    // save encoded image
                    $storagePath = storage_path('app/public/answer_sm');

                    $encoded->save($storagePath . '/' . $filename);
                } 
            }
    
            $answer = Answer::create([
                'user_id'       => $request->user_id, 
                'question_id'   => $request->question_id, 
                'locale'        => $request->locale, 
                'field'         => $request->field, 
                'answer'        => $request->answer, 
                'file_type'     => $request->fileType, 
                'file_sort'     => $request->fileSort, 
                'file_path'     => $path, 
                'file_name'     => $originalFileName, 
            ]);

            $question = Question::where("id", $request->question_id)->withCount(['likes', 'unlikes'])->first();

            return response()->json([
                'question' => $question, 
                'answer' => $answer, 
                "status" => "success"
            ], 200);
        } catch (\Throwable $th) {
            Log::debug([ "answer catch =======================", $th->getMessage() ] );
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
    public function update(Request $request, Answer $answer)
    {
        try {
            $validator = Validator::make($request->all(), [
                'abused_user_id'    => ["required", 'exists:users,id'], 
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                // Now you can work with the $errors object, which contains the validation errors
                // For example:
                return response()->json(['status' => 'error', 'message' => 'Validation error', 'errors' => $errors], 422);
            }


            $answer->is_abused            = "1";
            $answer->abused_user_id       = $request->abused_user_id; 
            $answer->save();

            $question = Question::where("id", $answer->question_id)->withCount(['likes', 'unlikes'])->first();

            Log::debug(["question ===== updated: ", json_encode($question)]);

            return response()->json([
                'question' => $question, 
                'answer' => $answer, 
                "status" => "success"
            ], 200);

        } catch (\Throwable $th) {
            Log::debug(["Throwable ===== catch: ", $th->getMessage()]);
            //throw $th;
            return response()->json([
                "message" => $th->getMessage(), 
                "status" => "error"
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
