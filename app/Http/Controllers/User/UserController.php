<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getUsers(){

      $allusers = User::all();

       return view('user_Role', ['users'=>$allusers]);
       
    }

    public function changeRole(){


    }

    public function deleteUser(){


    }



}
