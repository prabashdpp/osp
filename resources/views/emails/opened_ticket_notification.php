<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Suppor Ticket Information</title>
</head>
<body>
<p>
Thank you {{ ucfirst($ticket->lname) }} for contacting Online support team. Please refer below details:
We are doing our best to serve you!
</p>
 
<p>Title: {{ $ticket->title }}</p>
<p>Status: {{ $ticket->status }}</p>
 
<p>
You can view the ticket at any time at {{ url('tickets/'. $ticket->ticket_id) }}
</p>
 
</body>
</html>