 
@extends('layouts.app')

@section('content')
 
 
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p><b>#{{ $ticket->ticket_id }} - {{ $ticket->title }}</b></p>
                </div>
 
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    <div class="ticket-info">
                        <p>{{ $ticket->message }}</p>
                        <p>
                            @if ($ticket->status === 'Open')
                                <b>Status : </b><span class="badge badge-success">{{ $ticket->status }}</span>
                            @else
                                <b>Status : </b><span class="badge badge-danger">{{ $ticket->status }}</span>
                            @endif
                        </p>
                        <p><b>Created on : </b>{{ $ticket->created_at->diffForHumans() }}</p>
                    </div>
 
                </div>
            </div>
 
            <hr>
 
            @include('tickets.replies')
 
            <hr>
 
            @include('tickets.reply')
 
        </div>
    </div>
 
 
@endsection