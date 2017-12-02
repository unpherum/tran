<?php

namespace App\Http\Controllers\boxtoshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	return view('boxtoshop.index');
    }

}
