<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

use DB;

use Mail;
use App\Mail\ContactUsMail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $phone_number = $request->query("phone_number");
        $users = User::whereRaw(DB::raw("CONCAT(phone_code, phone_number) LIKE '%$phone_number%'"));

        if( $request->query("email") ) {
            $users = $users->where("email", "LIKE", "%".$request->query("email")."%");
        }
        if( $request->query("first_name") ) {
            $users = $users->where("first_name", "LIKE", "%".$request->query("first_name")."%");
        }
        if( $request->query("surname") ) {
            $users = $users->where("surname", "LIKE", "%".$request->query("surname")."%");
        }
        if( $request->query("year_of_birth") ) {
            $users = $users->where("year_of_birth", "LIKE", "%".$request->query("year_of_birth")."%");
        }
        if( $request->query("school_name") ) {
            $users = $users->where("school_name", "LIKE", "%".$request->query("school_name")."%");
        }
        if( $request->query("city") ) {
            $users = $users->where("city", "LIKE", "%".$request->query("city")."%");
        }
        if( $request->query("gender") ) {
            $users = $users->where("gender", "LIKE", "%".$request->query("gender")."%");
        }
        if( $request->query("grade") ) {
            $users = $users->where("grade", "LIKE", "%".$request->query("grade")."%");
        }
        if( $request->query("field_of_interest") ) {
            $users = $users->where("field_of_interest", "LIKE", "%".$request->query("field_of_interest")."%");
        }
        $users = $users->with(["answers", "questions"])->paginate(10);

        return view("admin.pages.users.index", compact('users'));
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
    public function destroy(User $user)
    {
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

        return redirect()->back();
    }



    public function questions(Request $request) 
    {
        
        $questions = Question::where("user_id", $request->query("id"))->get();

        return view("admin.pages.users.questions", compact('questions'));
    }

    public function answers(Request $request) 
    {
        $answers = Answer::where("user_id", $request->query("id"))->get();

        return view("admin.pages.users.answers", compact('answers'));
    }

    public function answersByQuestion(Request $request) 
    {
        $answers = Answer::where("question_id", $request->query("question_id"))->with(['abuse_user'])->get();
        
        return view("admin.pages.users.answers_by_question", compact('answers'));
    }

    public function excel() 
    {
        $spreadsheet = new Spreadsheet();
        
        
        // Add data to the spreadsheet
        $users = User::all();
        $sheet = $spreadsheet->getActiveSheet();
        $headerRow = [
            'first_name'        => "First Name", 
            'surname'           => "Surname", 
            'phone_code'        => "Phone Code", 
            'phone_number'      => "Phone Number", 
            'email'             => "Email", 
            'year_of_birth'     => "Year Of Birth", 
            'school_name'       => "School Name", 
            'city'              => "City", 
            'gender'            => "Gender", 
            'grade'             => "Grade", 
            'field_of_interest' => "Field Of Interest", 
        ];

        $cellIndex = 2;
        foreach ($headerRow as $key => $cellValue) {
            $sheet->setCellValueByColumnAndRow(1, 1, "No.");
            $sheet->setCellValueByColumnAndRow($cellIndex++, 1, $cellValue);
        }

        $rowIndex = 2;
        foreach ($users as $user) {
            $cellIndex = 2;
            foreach ($headerRow as $key => $cellValue) {
                $sheet->setCellValueByColumnAndRow(1, $rowIndex, $rowIndex - 1);
                $sheet->setCellValueByColumnAndRow($cellIndex++, $rowIndex, $user[$key]);
            }
            $rowIndex++;
        }


        // write data to excel object and download
        $writer = new Xlsx($spreadsheet);
    
        $response = new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        });
    
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment; filename="users.xlsx"');
        
        return $response;
    }


    public function showAllData(Request $request) 
{
    $phoneNumber = $request->query("phone_number");

    $users = User::query()
        ->when($phoneNumber, function ($q) use ($phoneNumber) {
            $q->whereRaw(
                "CONCAT(phone_code, phone_number) LIKE ?",
                ["%{$phoneNumber}%"]
            );
        })
        ->when($request->query("first_name"), fn($q) =>
            $q->where("first_name", "LIKE", "%".$request->query("first_name")."%")
        )
        ->when($request->query("surname"), fn($q) =>
            $q->where("surname", "LIKE", "%".$request->query("surname")."%")
        )
        ->when($request->query("year_of_birth"), fn($q) =>
            $q->where("year_of_birth", "LIKE", "%".$request->query("year_of_birth")."%")
        )
        ->when($request->query("school_name"), fn($q) =>
            $q->where("school_name", "LIKE", "%".$request->query("school_name")."%")
        )
        ->when($request->query("city"), fn($q) =>
            $q->where("city", "LIKE", "%".$request->query("city")."%")
        )
        ->when($request->query("gender"), fn($q) =>
            $q->where("gender", "LIKE", "%".$request->query("gender")."%")
        )
        ->when($request->query("grade"), fn($q) =>
            $q->where("grade", "LIKE", "%".$request->query("grade")."%")
        )
        ->when($request->query("field_of_interest"), fn($q) =>
            $q->where("field_of_interest", "LIKE", "%".$request->query("field_of_interest")."%")
        )
        ->paginate(10)
        ->withQueryString();

    $questions = collect();
    $answers = collect();

    if ($request->query("user_id")) {

        $userId = $request->query("user_id");

        $questions = Question::where('user_id', $userId)->get();

        $answers = Answer::with([
                'user:id,phone_code,phone_number'
            ])
            ->where('user_id', $userId)
            ->when($request->query("question_id"), fn($q) =>
                $q->where('question_id', $request->query("question_id"))
            )
            ->get();
    }

    return view("admin.pages.show_all_data.index", compact('users', 'questions', 'answers'));
}
}
