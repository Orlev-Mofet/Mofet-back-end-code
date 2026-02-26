<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Question;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $wall = $request->query('wall');
            $page = $request->query("page");
            $user = User::where('id', $request->user_id)->first();

            $query = Question::with("user")
                ->where('locale', $request->query('locale'))
                ->where("question", "like", "%{$request->query("search")}%");

            // check wall
            if( $wall == "Mathematics" ) {
                $query = $query->whereIn("field", [ "Mathematics", "Both"]);
            } else if ( $wall == "Physics" ) {
                $query = $query->whereIn("field", [ "Physics", "Both" ]);
            } else if ( $wall == "Both" ) {
                $query = $query->whereIn("field", [ "Mathematics", "Physics", "Both" ]);
            } else if ( $wall == "MyOnly" ) {
                $user_id = $request->user_id;

                $query = $query->where("user_id", $user_id);
                    // ->orWhereHas('answers', function ($query) use ($user_id) {
                    //     $query->where('user_id', $user_id);
                    // });
            }

            $result = $query
                ->where("is_abused", '0')
                ->withCount(['likes', 'unlikes'])
                ->orderBy("created_at", "desc")
                ->paginate(10);


            return response()->json([
                'data' => $result, 
                "status" => "success"
            ], 200);
        } catch (\Throwable $th) {
            Log::debug([ "first Throwable: ",  $th->getMessage()]);
            return response()->json([
                "message" => $th->getMessage(), 
                "status" => "error"
            ], 422);
        }
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
                'question'          => ['required'],
                'user_id'           => ['required', 'exists:users,id'], 
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
                $path = $file->storeAs('question', $filename, 'public');

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
                    $storagePath = storage_path('app/public/question_sm');

                    $encoded->save($storagePath . '/' . $filename);
                } 
            }
    
            $question = Question::create([
                'user_id'       => $request->user_id, 
                'locale'        => $request->locale, 
                'field'         => $request->field, 
                'question'      => $request->question, 
                'file_type'     => $request->fileType, 
                'file_sort'     => $request->fileSort, 
                'file_path'     => $path, 
                'file_name'     => $originalFileName, 
            ]);
            Log::debug([ "question created =======================question.id => ", $question->id] );
    
            $savedQuestion = Question::where('id', $question->id)
                ->with("user")
                ->withCount(['likes', 'unlikes'])
                ->first();

            return response()->json([
                'question' => $savedQuestion, 
                "status" => "success"
            ], 200);
        } catch (\Throwable $th) {
            Log::debug([ "question catch =======================", $th->getMessage() ] );
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
    public function update(Request $request, Question $question)
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

            $question->is_abused            = "1";
            $question->abused_user_id       = $request->abused_user_id; 
            $question->save();

            return response()->json([
                'question' => $question, 
                "status" => "success"
            ], 200);

        } catch (\Throwable $th) {
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

    public function getQuestionById(Request $request) {
        try {
            $question = Question::where('id', $request->query('question_id'))->first();

            return response()->json([
                'question' => $question, 
                "status" => "success"
            ], 200);
        } catch (\Throwable $th) {
            Log::debug([ "first Throwable: ",  $th->getMessage()]);
            //throw $th;
            return response()->json([
                "message" => $th->getMessage(), 
                "status" => "error"
            ], 422);
        }

    }
}
