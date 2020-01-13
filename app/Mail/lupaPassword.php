<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class lupaPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $model;
    public $email;
    public $encryptedId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
        $this->email = $model->email;

        $this->encryptedId = encrypt($model->id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@sadepos.com', 'Sade POS')
                    ->subject('Pemulihan Kata Sandi')
                    ->view('email.lupapassword');
    }
}
