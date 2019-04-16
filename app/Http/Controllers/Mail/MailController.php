<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;

class MailController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return view('emails.bulkmailer');
        }else{
            return redirect()->route('home');
        }
    }

    public function bulkmail(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, array(
                'target_email' => 'required|email',
                'message' => 'required',
                'count' => 'required|numeric'
            ));
            
            $data = array(
                'target_email' => $request['target_email'],
                'bodyMessage' => $request['message'],
                'count' => $request['count']
            );
                // dd($data);
                
                $count = $data['count']; 
                for($i=1; $i<=$count; $i++){
                    Mail::send('emails.mailermessage', $data, function($message) use ($data){  
                        $message->from('mishan2512@gmail.com');
                        $message->to($data['target_email']);
                        $message->subject('Congratulation!!');
                    });
                }          
               

            return redirect()->route('bulkmailer')->with('message', 'Message Successfully Sent Mail');
        }else{
            return redirect()->route('bulkmailer')->with('message', 'Fail To Send Mail');
        }
    }
}
