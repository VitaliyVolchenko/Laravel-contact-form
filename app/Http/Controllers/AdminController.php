<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $messages = Message::with('user')->orderBy('created_at')->get();
       
        return view('admin.index',
            [
                'messages' => $messages,                
            ]
        );        
    }

    public function getMessage($id)
    {
        $message = Message::find($id);
        
        return view('admin.message', compact('message'));
    }

    public function MarkAnswered(Request $request)
    {
        $id = $request->id;
        $message = Message::find($id);
        $message->mark = "answered";
        $message->update();

        return redirect()->route('admin.index');
    }
}
