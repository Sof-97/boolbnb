<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;

class Message extends Model
{
    protected $fillable = [
        'id_apartment', 'text', 'email_sender'
    ];
}
