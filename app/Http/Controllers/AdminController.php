<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

    	return view('admin.home.homeContent');
    }

    public function logout(){

    	return view('auth.login');
    }


}
