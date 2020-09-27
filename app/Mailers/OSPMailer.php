<?php
 
namespace App\Mailers;
 
use App\Ticket;
use Illuminate\Contracts\Mail\Mailer;
 
class OSPMailer
{
    protected $mailer;
    protected $fromAddress = 'support@osp.dev';
    protected $fromName = 'Trouble Ticket @ OSP';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];
 
    /**
     * AppMailer constructor.
     * @param $mailer
     */
     
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
 
    public function sendTicketInformation(Ticket $ticket)
    {
        $this->to = $ticket->email;
 
        $this->subject = "[Ticket ID: $ticket->ticket_id] $ticket->title";
 
        $this->view = 'emails.opened_ticket_notification';
 
        $this->data = compact('ticket');
 
       // die($ticket);
        
        return $this->deliver();
    }
 
    public function sendTicketReply($user, Ticket $ticket, $reply)
    {
        $this->to = $ticket->email;
 
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
 
        $this->view = 'emails.replied_ticket_notification';
 
        $this->data = compact('user', 'ticket', 'reply');
 
        return $this->deliver();
    }
 
    public function sendClosedTicketStatusNotification(Ticket $ticket)
    {
        $this->to = $ticket->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'emails.closed_ticket_notification';
        $this->data = compact('ticket'); 
        return $this->deliver();
    }
 
    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function($message){
 
            $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);
 
        });
    }
}