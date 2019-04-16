<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Validator;


class SmsController extends Controller
{
    public function Sms()
    {
        return view('sms.sms');        
    }

    public function sendsms(Request $data)
    {
        // dd($data['mobile']);
        // dd($data);
        // for($x=$data['count'];$x<=0;$x++){
            // $basic  = new \Nexmo\Client\Credentials\Basic('f26e08ea', 'rWsa8NbS9mtXFmeR');
            // $client = new \Nexmo\Client($basic);
            
            // $message = $client->message()->send([
            //     'to' => '91'.$data['mobile'],
            //     'from' => 'Nexmo',
            //     'text' => 'Hello from Nexmo'
            // ]);
            // echo 'asd';
        // }
        // return view('sms.sms')->with('message', 'sms sent');
       
        for($x=1;$x<=2;$x++){
            $basic  = new \Nexmo\Client\Credentials\Basic('3d40507d', 'cElX1tlhzjsvjcIV');
            $client = new \Nexmo\Client($basic);
            $message = $client->message()->send([
                'to' => '917984444322',
                'from' => 'this',
                'text' => 'Hello this is demo message,Dont take it seriously.',
            ]);
        }
    }
}
