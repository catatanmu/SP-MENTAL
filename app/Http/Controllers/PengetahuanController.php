<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PengetahuanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:pengetahuan', ['only' => ['index']]);
    }
	
	public function index()
    {
        

        return view('admin.pengetahuan');
    }

    /**
    * Show dashboard
    *
    * @return \Illuminate\Http\Response
    */
  

        
}
