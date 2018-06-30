<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailClass extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $theme;
    protected $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $theme, $msg)
    {
        $this->name = $name;
        $this->email = $email;
        $this->theme = $theme;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact-message')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'theme' => $this->theme,
                'msg' => $this->msg,
        ])->subject('New contact message');
    }
}
