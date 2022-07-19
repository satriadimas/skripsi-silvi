<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function send() {
        $details = [
            'title' => 'Test Mail',
            'body' => 'Test Mail from ibnu'
        ];

        \Mail::to('mibnusna@gmail.com')->send(new SendMail($details));
        return view('home');
    }
}
