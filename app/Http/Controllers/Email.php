<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\PemiluEmail;
use Illuminate\Support\Facades\Mail;

class Email extends Controller
{
    public function send(Request $request)
{
        Mail::to("testing@malasngoding.com")->send(new PemiluEmail());
 
        return "Email telah dikirim";
}
}