<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Yajra\DataTables\DataTables;
use App\Mailers\OSPMailer;
Use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $tickets = Ticket::orderBy('id', 'DESC')->paginate(5);
        return view('tickets.index', ['tickets' => $tickets]);
    }

    public function search(Request $request) {

        $q = $request->input('q');

        $tickets = Ticket::where('fname', 'LIKE', '%' . $q . '%')->orWhere('lname', 'LIKE', '%' . $q . '%')->paginate(1);
        if (count($tickets) > 0) {
            return view('tickets.index', ['tickets' => $tickets]);
        } else {
            return view('tickets.index')->withMessage('No Details found. Try to search again !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, OSPMailer $mailer) {

        //input validations
        $this->validate($request, [
            'title' => 'required|max:255',
            'email' => 'required|email|max:255|regex:/(.*)@myemail\.com/i',
            'phone_no' => 'required|min:10|max:15|numeric',
            'fname' => 'required|max:50|alpha',
            'lname' => 'required|max:50|alpha',
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
        //redirect to the same guest page
        return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
    }

//    Generate random unguessalbe number for ticket number
    function generateRandomNumber() {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $number = str_shuffle($pin);

        // check whether database exists already
        if ($this->numberExists($number)) {
            //recurring the function if already exisits
            return generateRandomNumber();
        }
        // otherwise, it's valid and can be used
        return $number;
    }

    function numberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Ticket::where('ticket_id', '=', $number)->exists();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_id) {
        //checking for single tickets
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        // die($ticket);
        if (Auth::check()) {
            $ticket->read = 1;
            $ticket->user_id = Auth::user()->id;
            $ticket->save();
        }

        return view('tickets.show', ['ticket' => $ticket]);
    }

    public function close($ticket_id, OSPMailer $mailer) {
        $ticket = Ticket::where('id', $ticket_id)->firstOrFail();

        $ticket->status = "Closed";

        $ticket->save();

        //send notification mail
        $mailer->sendClosedTicketStatusNotification($ticket);
        //used fake smtp mailbox mailtrap to check the mails

        return redirect()->back()->with("status", "The ticket has been closed.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    public function index2(Request $request) {
        // data table
        if ($request->ajax()) {
            $data = Ticket::latest()->get();
            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row) {

                                $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }

        return view('tickets.index2');
    }

}
