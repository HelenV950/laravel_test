<?php

namespace App\Http\Controllers;

use App\Mail\newMail;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send()
    {
        Mail::send(new newMail());
    }
    public function email()
    {
       return view('email');
    }
}
