<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Demand;

class DemandCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $demand;
    protected $attestation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Demand $demand)
    {
        $this->demand = $demand;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $attestation = $this->demand->attestation;
        return $this->subject('Demande créée avec succès')->markdown('emails.demand.created');
    }
}
