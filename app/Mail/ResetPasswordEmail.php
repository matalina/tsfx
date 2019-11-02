<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function build()
    {
        return $this->view('email.resetPassword')
            ->with('password', $this->password);
    }
}
