<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //

    public function user_send_message(Request $request){


        $details = [
            'title' => 'Mail from '.$request->name,
            'body' => $request->message,
            'subject' => $request->subject,
        ];

        Mail::to('hatttem.hassan12345@gmail.com')->send(new SendMail($details));
        return back()->with(['success'=>'sent successfully']);
    }
}
