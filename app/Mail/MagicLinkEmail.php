<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MagicLinkEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $magicLink;

    /**
     * Create a new message instance.
     *
     * @param string $magicLink
     */
    public function __construct(string $magicLink)
    {
        $this->magicLink = $magicLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.magic-link')
            ->subject('Your Magic Link')
            ->with([
                'magicLink' => $this->magicLink,
            ]);
    }
}
