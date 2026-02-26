<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use App\Models\Vote;
use App\Models\Question;

class VoteController extends Controller
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
                'user_id'           => ['required', 'exists:users,id'], 
                'sort'              => ["required"], 
                'type'              => ["required"]
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                // Now you can work with the $errors object, which contains the validation errors
                // For example:
                return response()->json(['status' => 'error', 'message' => 'Validation error', 'errors' => $errors], 422);
            }

            $question_id = $request->question_id;

            $vote = Vote::create([
                'user_id'       => $request->user_id, 
                'question_id'   => $request->question_id, 
                'answer_id'     => $request->answer_id, 
                'sort'          => $request->sort, 
                'type'          => $request->type, 
            ]);

            $question = Question::where("id", $request->question_id)->withCount(['likes', 'unlikes'])->first();

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
    public function update(Request $request, Vote $vote)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id'           => ['required', 'exists:users,id'], 
                'sort'              => ["required"], 
                'type'              => ["required"]
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                // Now you can work with the $errors object, which contains the validation errors
                // For example:
                return response()->json(['status' => 'error', 'message' => 'Validation error', 'errors' => $errors], 422);
            }

            $question_id = $request->question_id;

            $vote->user_id       = $request->user_id; 
            $vote->question_id   = $request->question_id; 
            $vote->answer_id     = $request->answer_id; 
            $vote->sort          = $request->sort; 
            $vote->type          = $request->type; 
            $vote->save();

            $question = Question::where("id", $request->question_id)->withCount(['likes', 'unlikes'])->first();

            Log::debug(["question ===== updated: ", json_encode($question)]);

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
    public function destroy(Vote $vote)
    {
        try {

            $question_id = $vote->question_id;
            $vote->delete();
            $question = Question::where("id", $question_id)->withCount(['likes', 'unlikes'])->first();

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
}
