<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user_list = User::all();
            return view('user.index', compact('user_list'));
        }else{
            return redirect()->route('home');
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $user = User::find($id);
            return view('user.view', compact('user'));
        }else{
            return redirect()->route('home');
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $status = User::find($id);
            if($status['admin'] == '1'){
                $user = User::find($id);
                $user->admin='0';
                $user->save();
            }else if($status['admin'] == '0'){
                $user = User::find($id);
                $user->admin='1';
                $user->save();
            }
            
            return redirect('user')->with('success', 'user is now admin');
        }else{
            return redirect()->route('home');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $user = User::find($id);
            $user->delete();
    
            return redirect('user')->with('success', 'user has been deleted');       
        }else{
            return redirect()->route('home');
        }
       
    }
}
