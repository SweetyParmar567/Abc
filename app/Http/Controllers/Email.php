<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\MAil_Tbl;
use Illuminate\Routing\Controller as BaseController;

// use App\Mail\SendMail;
// use Illuminate\Support\Facades\Mail;

class Email extends BaseController
{
    public function index(){
 
        return view('mailsend');
         
     }

    public function MailSend(Request $request)
    {
        // print_r($_POST);exit;

        $request->validate([
            'subject'=> 'required',
            'message'=>'required',
            'email'=>'required',
           ]);

        $POST = new MAil_Tbl;
        $POST->subject = $request->get('subject');
        $POST->message = $request->get('message');
        $POST->email = $request->get('email');


        // $arham = new Arham_Data_Insert;
        // $arham->name = $request['name'];
        // $arham->email = $request['email'];
        //    $name = $request->input('subject');
        //    $message = $request->input('message');
        //    $email = $request->input('email');


        // $details = [
        //     'title' => $request->get('name_user'),
        //     'body' => $request->get('Mobile_No')
        // ];
        // // $emails = array("mohit.s@arhamshare.com", "software@arhamshare.com");

        // \Mail::to($request->get('User_Email'))->send(new \App\Mail\MyEmail($details));

        $details = [
            'title' => $request->get('subject'),
            'body' => $request->get('message')
        ];

        // $email = 'prsweety567@gmail.com';
        // $name = 'prsweety567 Name';


        Mail::to($request->get('email'))->send(new \App\Mail\SendMail($details));
        return redirect('/MailSend')->with('success','Mail Sent Successfully'); 
        // Mail::to($email, $name)->send(new \App\Mail\SendMail());

        // // Optionally, you can check if the email was sent successfully
        // if (Mail::failures())
        // {
        //     echo 'Handle failure';
        //     exit();
        // } else 
        // {
        //     echo "Email sent successfully";
        //     exit();
        //     // 
        // }
        
        // Mail::to('prsweety567@gmail.com')->send(new App\Mail\SendMail($details));
        // // print_r($abcd);exit;
        // dd('Mail Sent');
        // return view('emails.thanks');

        // $details = ['name'=>"D Parmar",'data'=>"Hello DP"];
        // // $data = array('name'=>"D Parmar",'data'=>"Hello DP");
        // // print_r($data);exit;
        // // Mail::\send('mail', $data, function($messages) use ($user){8
        // //     $messages->to('prsweety567@gmail.com');
            
        // //     $messages->subject('Hello DP');        
        // // });
        // Mail::send('mail', $details, function($message) {
        // $message->to('prsweety567@gmail.com', 'Tutorials Point')->subject
        //     ('Laravel Basic Testing Mail');
        // $message->from('xyz@gmail.com','D Parmar');
        // print_r($message);
        // });
        // echo "Basic Email Sent. Check your inbox.";
    }
}
