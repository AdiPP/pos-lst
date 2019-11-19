<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Registrasi extends Mailable
{
    use Queueable, SerializesModels;
    public $model;
    public $vkey;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
        $this->vkey = encrypt($model->email);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pos.lawangsewu@gmail.com', 'POSLST')
                    ->subject('Pendaftaran Berhasil')
                    ->view('email.registrasi');
    }
}
