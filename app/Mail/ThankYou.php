<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\CustomerResponse;
use Illuminate\Queue\SerializesModels;

class ThankYou extends Mailable
{
    use Queueable, SerializesModels;
    public $customerResponse;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CustomerResponse $customerResponse)
    {
        $this->customerResponse = $customerResponse;
     
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.email_template_thankyou')
        ->with(['nama' => $this->customerResponse->customerResponseName]);
        

    }
}
