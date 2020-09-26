<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
     protected $fillable = [
        'ticket_id', 'title', 'email', 'phone_no', 'fname', 'lname', 'message', 'status'
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
