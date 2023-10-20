<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        // print_r($details);exit;
        $this->details = $details;
        // $this->subject = $data['subject'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Durga Parmar')
        ->view('emails.thanks');   
        // return $this->view('view.name');
        // return $this->subject($this->subject)->view('mailsend')->with('data',$this->data);
    }
}
