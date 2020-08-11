<?php

namespace App\Mail;

use App\LoginRequest as LoginRequestModel;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The LoginRequest instance.
     *
     * @var LoginRequestModel
     */
    public $loginRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(LoginRequestModel $loginRequest)
    {
        $this->loginRequest = $loginRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.login-request');
    }
}
