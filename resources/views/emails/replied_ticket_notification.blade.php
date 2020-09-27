<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Support Ticket Reply</title>
</head>
<body>
<p>
    {{ $reply->reply }}
</p>
 
-------------------------------
<p>Replied by: {{ $user->name }}</p>
 
<p>Title: {{ $ticket->title }}</p>
<p>Ticket ID: {{ $ticket->ticket_id }}</p>
<p>Status: {{ $ticket->status }}</p>
 
<p>
    You can view the ticket at any time at {{ url('tickets/'. $ticket->ticket_id) }}
</p>
 
</body>
</html>
