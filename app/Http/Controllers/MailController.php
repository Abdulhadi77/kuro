<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //

    public function user_send_message(Request $request){

      $email=Setting::find(1);
        $details = [
            'title' => 'Mail from '.$request->name,
            'body' => $request->message,
            'subject' => $request->subject,
        ];

        Mail::to($email->email)->send(new SendMail($details));
        return back()->with(['success'=>'sent successfully']);
    }
}
