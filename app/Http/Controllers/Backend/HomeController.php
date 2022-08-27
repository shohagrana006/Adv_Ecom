<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function userList()
    {
        $users = User::select('name','email','phone_number')->orderBy('id','desc')->get();
        return view('dashboard.userlist',['users'=>$users]);
    }
}
