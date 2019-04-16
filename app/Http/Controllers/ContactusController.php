<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Console\Presets\React;
use Mail;
// use Illuminate\Support\Facades\Request;
class ContactusController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function contactus()
    {
        if (Auth::check()) {
            return view('shop.contactus');
        }else{
            return redirect()->route('home');
        }
        
    }

    public function postcontact(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, array(
                'full_name' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            ));
            
            $data = array(
                'full_name' => $request['full_name'],
                'email' => $request['email'],
                'bodyMessage' => $request['message']
            );
            // echo $data['email']; exit();
            Mail::send('emails.contactus', $data, function($message) use ($data){  
                $message->from($data['email']);
                $message->to('mishan2512@gmail.com');
                $message->subject($data['full_name']);
                $message->cc(['mishangoti555@gmail.com','mishan.goti2512@gmail.com']);
                // $message->bcc()
                // $message->() 
            });
            return view('shop.contactus');
            // Mail::queue();
        }else{
            return redirect()->route('home');
        }
        
    }
}