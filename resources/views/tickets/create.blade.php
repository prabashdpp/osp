@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h3 class="display-5">Open a New Ticket</h3>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <form method="post" action="{{ route('save_ticket') }}">
                @csrf
                <div class="form-group">    
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" name="fname"/>
                </div>

                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control" name="lname"/>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email"/>
                </div>
                <div class="form-group">
                    <label for="phone_no">Phone:</label>
                    <input type="text" class="form-control" name="phone_no"/>
                </div>                
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title"/>
                </div>

                <div class="form-group">
                    <label for="message">Message</label> 
                    <textarea rows="10" id="message" class="form-control" name="message"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Open Ticket</button>
            </form>
        </div>
    </div>
</div>
@endsection