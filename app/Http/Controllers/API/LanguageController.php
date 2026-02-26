<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Language;
use App\Models\Constant;

class LanguageController extends Controller
{

    public function getAll() 
    {
        try {
            $languageData = Language::get();
            $languages = [];
            foreach ($languageData as $key => $value) {
                $languages[] = array("lang.en.".$value->key => $value->en);
                $languages[] = array("lang.ar.".$value->key => $value->ar);
                $languages[] = array("lang.he.".$value->key => $value->he);
            }

            $constantData = Constant::all();
            $constants = [];

            foreach ($constantData as $key => $value) {
                $constants[] = array($value->key => $value->value);
            }

            return response()->json([
                'languages' => $languages, 
                'constants' => $constants, 
                "status" => "success"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(), 
                "status" => "error"
            ], 422);
        }
        
    }

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
