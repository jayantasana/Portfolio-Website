<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    function SentMail(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'regex:/(.+)@(.+)\.(.+)/i'],
            'message' => ['required']
        ]);

        $contacts = new ContactUs;
        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->message = $request->message;
        $contacts->save();

        Mail::send('contact_message',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'body_message' => $request->get('message'),
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to('sanajayantakumar@gmail.com')->subject('Cloudways Feedback');
               });
    return redirect()->route('Front','#contact')->with('EmailSend', "Your Message Send Successfully");
    }

    function MailTable(){
        $mail = Mail::all();
        return view('contact_message',[
            'mail'=>$mail
        ]);
    }
}
