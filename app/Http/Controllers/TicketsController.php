<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Yajra\DataTables\DataTables;
use App\Mailers\OSPMailer;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2(Request $request)
    {     
        
       
            if ($request->ajax()) {
            $data = Ticket::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('tickets.index');
        
        //$tickets = Ticket::orderBy('id')->paginate(10);
       // return view('tickets.index', ['tickets' => $tickets]);
    }
    
    
   public function index(Request $request)
    {          
        $tickets = Ticket::orderBy('id')->paginate(10);
        return view('tickets.index', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  OSPMailer $mailer)
    {
         $this->validate($request, [
            'title' => 'required',
            'email' => 'required', 
            'phone_no' => 'required', 
            'fname' => 'required',
            'lname' => 'required',
            'message' => 'required'
        ]);
         

        $ticket = new Ticket([
            'title' => $request->input('title'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'ticket_id' => $this->generateRandomNumber(),
            'message' => $request->input('message'),
            'status' => "Open"
        ]);
 
        $ticket->save();
 
        $mailer->sendTicketInformation($ticket);
        //return redirect('/employees')->with('success', 'Employee saved!');
        return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
    }
    
    
    function generateRandomNumber() {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
                 . mt_rand(1000000, 9999999)
                 . $characters[rand(0, strlen($characters) - 1)];

            // shuffle the result
            $number = str_shuffle($pin);
           
            // check database exists already
            if ($this->numberExists($number)) {
                return generateRandomNumber();
            }
        // otherwise, it's valid and can be used
        return $number;
    }

    function numberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Ticket::where('ticket_id', '=',$number)->exists();
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail(); 
        // die($ticket);
        return view('tickets.show', ['ticket' => $ticket]);
    }
    
    
     public function close($ticket_id, OSPMailer $mailer)
    {
        $ticket = Ticket::where('id', $ticket_id)->firstOrFail();
 
        $ticket->status = "Closed";
 
        $ticket->save();
 
        // $ticketOwner = $ticket->email;
 
        $mailer->sendClosedTicketStatusNotification($ticket);
 
        return redirect()->back()->with("status", "The ticket has been closed.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
