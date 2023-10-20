<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
// use File;




class Email1 extends Controller
{
    public function index(){
 
        return view('mailsend');
         
     }
     public function sendmail(Request $request)
     {
        // print_r($_POST);exit;
       $request->validate([
                 'subject'=> 'required',
                 'message'=>'required',
                 'email'=>'required',
                ]);
       //dd($request);
       $data = array(
         'subject' => $request->subject, 
         'message'=> $request->message ,
          );
        //   print_r($data); exit;
    //     $transport = (new SendEmail('us2.smtp.mailhostbox.com', 587, 'tls'))
    //     ->setUsername('donotreply@arhamshare.com')
    //     ->setPassword('H$#WTyZ0')
    //     ->setStreamOptions(array('ssl' => array('allow_self_signed' => true, 'verify_peer' => false)));
    // print_r($transport);exit;
    // $mailer = (new SendEmail($transport));
    //     try {
    //         $result = $mailer->send($data);
    //     } 
    //     catch (SendEmail $e) {
    //         echo $e->getMessage();
    //     }
         Mail::to($request->email)->send(new SendEmail($data));
         return back()->with('success', 'Sent Successfully !');
   
     }
}
