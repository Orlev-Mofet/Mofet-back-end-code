<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Redirect;

use App\Models\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::get();

        return view('admin.pages.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.language.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'key'        => ['required', 'unique:languages'],
            'en'         => 'required',
            'he'         => 'required',
            'ar'         => 'required',
        ]);

        $language = new Language;
        $language->key      = $request->key;
        $language->en       = $request->en;
        $language->he       = $request->he;
        $language->ar       = $request->ar;
        $language->save();

        return back()->withStatus('Language successfully saved.');
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
    public function edit(Language $language)
    {
        return view('admin.pages.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        request()->validate([
            'key'        => ['required'],
            'en'         => 'required',
            'he'         => 'required',
            'ar'         => 'required',
        ]);

        $language->key      = $request->key;
        $language->en       = $request->en;
        $language->he       = $request->he;
        $language->ar       = $request->ar;
        $language->save();

        return Redirect::to('admin/language')->withStatus('Language successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Language $language )
    {
        $language->delete();
        
        return Redirect::to('admin/language')->withStatus('Language successfully deleted.');
    }
}