<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\User;
use App\Message;
use Auth;
use Illuminate\Database\Eloquent\Model;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $usersid =  Auth::user()->id;
        $roles = User::find($usersid)->roles;
        return view('contact')->with('roles', $roles);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            $userEmail = $user->email;
            $userName = $user->name;

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/upload', $filename);

            $message = new Message;
            $message->theme = $request->theme;
            $message->message = $request->message;
            $message->filename = $filename;
            $message->mark = NULL;            
            $user->messages()->save($message);

            Mail::send('emails.contact-message',
                ['theme' => $request->theme, 'msg' => $request->message,
                 'name' => $userName, 'email' => $userEmail],
            function ($mail) use($user) {
                $mail->from($user->email, $user->name);
                $mail->to(env('MAIL_ADMIN_EMAIL'))->subject('Contact Message');
                
            });

            return redirect()->back()->with('status', 'Message sent successfully!');
            
        } else {
            return redirect()->route('register');
        }

    }     
    
}
