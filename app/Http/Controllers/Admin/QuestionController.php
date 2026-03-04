<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use App\Models\Question;
use App\Models\Answer;

use DB;
use Redirect;
use Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if(Auth::guard('admin')->user()->role === "admin") {
            return Redirect::to('/admin');
        }

        $questions = Question::where('field', "LIKE", "%".$request->query('field')."%");

        if($request->query("question")) {
            $questions = $questions->where('question', "LIKE", "%".$request->query('question')."%");
        }

        if($request->query("file_sort")) {
            $questions = $questions->where('file_sort', "LIKE", "%".$request->query('file_sort')."%");
        }

        if($request->query("file_name")) {
            $questions = $questions->where('file_name', "LIKE", "%".$request->query('file_name')."%");
        }

        $user = $request->query("user");
        if( $user ) {
            // $questions = $questions->with(['user' => function ($query) use ($user) {
            //     $query->where(DB::Raw("CONCAT(surname, '(', school_name, ' ', city, ')') LIKE '%$user%'"));
            // }]);
            $questions = $questions->with('user')->whereHas('user', function ($query) use ($user) {
                // Add additional conditions if needed
                $query->whereRaw(DB::Raw("CONCAT(surname, '(', school_name, ' ', city, ')') LIKE '%$user%'"));
            });
        }

        if($request->has("is_abused")) {
            $questions = $questions->where("is_abused", "1");
        }


        $questions = $questions->with('abuse_user')->paginate(10);

        Log::debug(["#### questions ###", $questions]);
        
        return view('admin.pages.questions.index', compact("questions"));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);

        return view('admin.pages.questions.show', compact('question'));
    }

     /**
     * Display answer by id.
     */
    public function showAnswer(Request $request, $id)
    {
        $answer = Answer::where('id', $id)
        ->where('question_id', $request->query('questionId'))
        ->with('abuse_user')
        ->firstOrFail();

        return view('admin.pages.questions.answer', compact('answer'));
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
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $question->question = $request->question;

        $question->save();

        return redirect()->route('questions.index', [
            'page' => $request->page
        ])->with('success', 'Question updated');
    }


    /**
     * Update answer
     */
    public function updateAnswer(Request $request, $id)
    {
        $answer = Answer::findOrFail($id);

        $answer->answer = $request->answer;

        $answer->save();

        return redirect()->route('questions.answers', [
            'page' => $request->page,
            'id' => $request->questionId
        ])->with('success', 'Answer updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
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
        
        return redirect()->back();
    }


    public function releaseAbuse(Request $request) 
    {
        $question = Question::find($request->query("id"));

        $question->is_abused      = '0';
        $question->abused_user_id = 0;
        $question->save();

        return redirect()->back();
    }

    public function answers(Request $request) 
    {
        $answers = Answer::where("question_id", $request->query("id"))->with('abuse_user')->get();

        return view("admin.pages.questions.answers", compact('answers'));
    }
}
