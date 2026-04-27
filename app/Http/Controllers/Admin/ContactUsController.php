<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ContactUs;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'desc');
    
        if (!in_array($sort, ['asc', 'desc'])) {
            $sort = 'desc';
        }
    
        $contact_us = ContactUs::with('user');
    
        if ($request->query("content")) {
    
            $search = trim($request->query("content"));
            $words = preg_split('/\s+/', $search);
    
            foreach ($words as $word) {
                $contact_us->where("content", "LIKE", "%" . $word . "%");
            }
        }
    
        if ($request->query("time")) {
    
            $input = trim($request->query("time"));
    
            $contact_us->whereRaw(
                "DATE_FORMAT(time, '%Y-%m-%d %H:%i:%s') LIKE ?",
                ["%{$input}%"]
            );
        }
    
        // 👤 USER (first_name + surname)
        if ($request->query("user")) {
    
            $search = trim($request->query("user"));
            $words = preg_split('/\s+/', $search);
    
            $contact_us->whereHas('user', function ($userQuery) use ($words) {
    
                foreach ($words as $word) {
    
                    $userQuery->where(function ($sub) use ($word) {
    
                        $sub->whereRaw('LOWER(first_name) LIKE ?', ['%' . strtolower($word) . '%'])
                            ->orWhereRaw('LOWER(surname) LIKE ?', ['%' . strtolower($word) . '%']);
    
                    });
    
                }
    
            });
        }
    
        $contact_us = $contact_us
            ->orderBy('time', $sort)
            ->paginate(10)
            ->withQueryString();
    
        return view("admin.pages.contact_us.index", compact("contact_us"));
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
    public function destroy(string $id)
    {
        //
    }
}
