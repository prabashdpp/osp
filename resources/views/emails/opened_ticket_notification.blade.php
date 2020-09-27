<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Online Support Ticket Opened</title>
</head>
<body>
<p>
Thank you {{ ucfirst($ticket->lname) }} for contacting our support team. 
A support ticket has been opened for you. 
We are doing our best to serve you.
Details of your ticket are shown below:
</p>
 
<p>Title: {{ $ticket->title }}</p>
<p>Priority: {{ $ticket->priority }}</p>
<p>Status: {{ $ticket->status }}</p>
 
<p>
You can view the ticket from the given link {{ url('tickets/'. $ticket->ticket_id) }}
</p>
 
</body>
</html>