<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Redirect;

use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::where('role', 'admin')->get();

        return view("admin.pages.admins.index", compact('admins'));
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
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return Redirect::to('admin/admins')->withStatus('Admin successfully deleted.');
    }

    public function active(Request $request) 
    {
        $id = $request->query('id');
        Admin::where('id', $id)->update(['active' => "1"]);

        return Redirect::to('admin/admins')->withStatus('Admin successfully actived.');
    }

    public function inactive(Request $request) 
    {
        $id = $request->query('id');
        Admin::where('id', $id)->update(['active' => "0"]);

        return Redirect::to('admin/admins')->withStatus('Admin successfully inactived.');
    }
}
