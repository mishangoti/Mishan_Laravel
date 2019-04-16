<?php

namespace App\Http\Controllers\Relations;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManytooneController extends Controller
{
    public function index()
    {   
        $data = User::find(30)->product()->get();
        
        return view('relations.relations',compact('data'));
    }
}
