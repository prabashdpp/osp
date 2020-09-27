<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Ticket;
Use Illuminate\Support\Facades\Auth;
use App\Mailers\OSPMailer;

class RepliesController extends Controller {

    public function sendReply(Request $request, OSPMailer $mailer) {

        $this->validate($request, [
            'reply' => 'required'
        ]);


        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $user = Auth::user();
        } else {
            $user_id = 0;
            $user_email = 0;
            $user = '';
        }

        $reply = Reply::create([
                    'ticket_id' => $request->input('ticket_id'),
                    'user_id' => $user_id,
                    'reply' => $request->input('reply')
        ]);

        // $ticket = Ticket::where('ticket_id', $request->input('ticket_id'))->firstOrFail(); 
        // 
        // send mail as reply only when support agent repllied
        if ($reply->ticket->email !== $user_email) {
            $mailer->sendTicketReply($user, $reply->ticket, $reply);
        }

        return redirect()->back()->with("status", "Your Reply has Sent.");
    }

}
