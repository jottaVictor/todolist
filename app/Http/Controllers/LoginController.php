<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function create(Request $request){

    }

    public function process(Request $request){

    }

    public function logout(Request $request){
        
    }
}
