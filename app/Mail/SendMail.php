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
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->details['type'] == '2') {
            return $this->subject('Balairung Anjungan Sumatera Barat')
            ->view('email.index');
        } else {
            return $this->subject('Balairung Anjungan Sumatera Barat')
            ->view('email.index2');
        }
        
    }
}
