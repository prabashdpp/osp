<div class="replies">
    @foreach($ticket->replies as $reply)
    <div class="panel panel">

        <div class="panel panel-heading">
            {{ $reply->user->name }}
            <span class="pull-right">{{ $reply->created_at->diffForHumans()}}</span>
        </div>

        <div class="panel panel-body">
            {{ $reply->reply }}
        </div>
        <hr>
    </div>
    @endforeach
</div>
