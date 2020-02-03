<?php

namespace App\Http\Controllers\Sdz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function getInfos()
    {
		return view('sdz\infos');
	}

	public function postInfos(Request $request)
	{
		return 'Le nom est ' . $request->input('nom'); 
	}

}