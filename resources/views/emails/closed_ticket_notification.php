<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suppor Ticket Status</title>
</head>
<body>
<p>
    Hello {{ ucfirst($ticket->lname) }},
</p>
    <p>Title: {{ $ticket->title }}</p>
    <p>Status: {{ $ticket->status }}</p>
<p>
    Your support with ID #{{ $ticket->ticket_id }} has been closed after it has resolved.
</p>
</body>
</html>