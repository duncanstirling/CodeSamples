<?php
namespace App\Mail;
//namespace App\Http\Controllers;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCompanyNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    /*public function build()
    {
        return $this->view('companies.notification');
    }*/
	
    public function build()
    {
        $address = 'me@myself.com';
        $name = 'Duncan';
        $subject = 'New Company Notification';
		
        return $this->view('companies.notification')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject);
    }	
}
