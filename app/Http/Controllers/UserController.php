<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    public function users()
    {
        $this->users = User::all();
        return view('admin.user.user',['users' => $this->users]);
    }

    public function changeRole($id)
    {
        $getRole = User::select('role')->where('id',$id)->first();
        if($getRole->role == 1)
        {
            $role = 0;
        }
        elseif($getRole->role == 0)
        {
            $role = 1;
        }
        User::where('id',$id)->update(['role'=>$role]);
        return back()->with('message','Role changed successfully.');
    }

    public function changeBanStatus($id)
    {
        $banned = User::select('ban_status')->where('id',$id)->first();
        if($banned->ban_status == 1)
        {
            $banStatus = 0;
        }
        elseif($banned->ban_status == 0)
        {
            $banStatus = 1;
        }
        User::where('id',$id)->update(['ban_status'=>$banStatus]);
        return back()->with('message','Selected user Ban status changed successfully.');
    }

    public function usersDetail($id)
    {
        $decryptID = Crypt::decryptString($id);
        $this->user = User::find($decryptID);
        return view('admin.user.detail',['user' => $this->user]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/users')->with('error', 'User not found.');
        }

        $user->delete();

        return redirect('/users')->with('message', 'Your item delete successfully');
    }

}
