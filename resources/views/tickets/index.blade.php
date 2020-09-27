@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <div class="col-sm-8">
            <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" name="q" placeholder="Search By Customer Name"> 
                </div>
                <span class="input-group-btn">           
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>

                </span>
            </form>
        </div>

    </div>
</div>




<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <div class="col-sm-8">

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
        </div>
        <h3 class="display-5">Tickets</h3>        
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Title</td>
                    <td>Status</td>

                    <td colspan =2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets ?? '' as $ticket)
                <!--Change color according to the read statuses-->
                <tr style="{{ $ticket->read == 0 ? 'background-color:#E8D7D7':''}}" >

                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->fname}} {{$ticket->lname}}</td>
                    <td>{{$ticket->email}}</td>
                    <td>{{$ticket->phone_no}}</td>
                    <td>{{$ticket->title}}</td>
                    <td>

                        @if ($ticket->status === 'Open')
                        <span class="badge badge-success">{{ $ticket->status }}</span>
                        @else
                        <span class="badge badge-danger">{{ $ticket->status }}</span>
                        @endif               

                    </td>

                    <td>
                        <form action="{{ route('get_tickets',$ticket->ticket_id)}}" method="get">
                            @csrf
                            <button class="btn btn-sm btn-warning" type="submit">Open</button>

                        </form>
                    </td>
                    <td>
                        <form action="{{ route('close', $ticket->id)}}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit">Close</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tickets ?? ''->links() }}

    </div>
</div>
@endsection

