<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function index()
    {
        return view('frontend.sendMail');
    }
}
