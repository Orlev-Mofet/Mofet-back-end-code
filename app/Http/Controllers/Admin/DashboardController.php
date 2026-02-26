<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display admin dashbard page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users_count = User::count();
        $questions_count = Question::count();
        $abused_questions_count = Question::where('is_abused', '1')->count();
        $answers_count = Answer::count();

        return view('admin.dashboard.index', compact("users_count", "questions_count", "abused_questions_count", "answers_count"));
    }
}
