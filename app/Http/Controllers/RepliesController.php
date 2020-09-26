<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reply;
use App\Ticket;
Use Illuminate\Support\Facades\Auth;
use App\Mailers\OSPMailer;

class RepliesController extends Controller{

    public function sendReply(Request $request, OSPMailer $mailer)
    {
        
       //die($request); 
        
        $this->validate($request, [
            'reply' => 'required'
        ]);
        
         
        $reply = Reply::create([
            'ticket_id' => $request->input('ticket_id'),
            'user_id' => Auth::user()->id,
            'reply' => $request->input('reply')
        ]);
           
         $ticket = Ticket::where('ticket_id', $request->input('ticket_id'))->firstOrFail(); 

        
        // send mail as reply only when support agent repllied
        if($reply->ticket->email !== Auth::user()->email) {
            $mailer->sendTicketReply(Auth::user(), $reply->ticket, $reply);
        }
 
        return redirect()->back()->with("status", "Your Reply has Sent.");
    }
}
    

