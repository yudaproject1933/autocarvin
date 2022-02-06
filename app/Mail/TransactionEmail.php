<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Storage;

class TransactionEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->details['link']);
        // return $this->subject('Test kirim email')->view('front.email');
        return $this->from('cs.getautorecord@gmail.com')
            ->subject('Your Vin Check History Report')
            ->attachFromStorage('public/report/'.$this->details['vin'].'.pdf')
            ->view('admin.dashboard.template_email');
    }
}
