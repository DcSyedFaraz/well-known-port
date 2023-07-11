<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentPaidMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $invoice;
    protected $source;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice,$source)
    {
        $this->invoice=$invoice;
        $this->source = $source;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->source->name)->markdown('email.payment-paid')->subject('Cheap Resume Writing Payment Confirmation')->with(["invoice"=>$this->invoice,"source"=>$this->source]);
    }
}
