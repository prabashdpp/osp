<div class="panel panel-default">
    <div class="panel-heading">Add reply</div>

    <div class="panel-body">
        <div class="comment-form">

            <form action="{{ url('reply') }}" method="POST" class="form">
                {!! csrf_field() !!}

                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                <div class="form-group{{ $errors->has('reply') ? ' has-error' : '' }}">
                    <textarea rows="10" id="reply" class="form-control" name="reply"></textarea>

                    @if ($errors->has('reply'))
                    <span class="help-block">
                        <strong>{{ $errors->first('reply') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
