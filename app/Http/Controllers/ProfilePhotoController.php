<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProfilePhoto;

class ProfilePhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        return view('admin.dashboard.setting',['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        return view('admin.dashboard.setting');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProfilePhoto::createProfilePhoto($request);
        return back()->with('message','Profile photo save successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.dashboard.setting',[
            'user' => User::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.dashboard.setting',[
            'user' => User::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ProfilePhoto::updateProfilePhoto($request, $id);
        return redirect('/profile')->with('message','Profile photo update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProfilePhoto::deleteProfilePhoto($id);
        return redirect('/profile')->with('message', 'Profile photo remove successfully.');
    }
}
