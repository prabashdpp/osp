@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <div class="col-sm-8">
        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div>
        @endif
      </div>
    <h3 class="display-5">Tickets</h3>        
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Title</td>
          
          <td colspan =2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
        <tr>
            <td>{{$ticket->id}}</td>
            <td>{{$ticket->fname}} {{$ticket->lname}}</td>
            <td>{{$ticket->email}}</td>
            <td>{{$ticket->phone_no}}</td>
            <td>{{$ticket->title}}</td>
            
            <td>
                 <form action="{{ route('get_tickets',$ticket->ticket_id)}}" method="get">
                  @csrf
                  <button class="btn btn-warning" type="submit">Open</button>

                </form>
            </td>
            <td>
                <form action="{{ route('close', $ticket->id)}}" method="post">
                  @csrf
                  <button class="btn btn-danger" type="submit">Close</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
        {{ $tickets->links() }}

</div>
</div>
 @endsection

