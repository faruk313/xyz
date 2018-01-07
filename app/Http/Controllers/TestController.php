<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function first($a=null,$b=null){

    	return $b;
    	return view('admin.admin_page');
    }
}
