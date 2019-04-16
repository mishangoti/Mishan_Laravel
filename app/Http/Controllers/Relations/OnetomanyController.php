<?php

namespace App\Http\Controllers\Relations;
use App\User;
// use App\Mobilenumber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class OnetomanyController extends Controller
{
    public function index()
    {   
        $data = User::find(30)->mobilenumbers;
        return view('relations.onetomany',compact('data'));
    }
}
