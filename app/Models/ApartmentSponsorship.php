<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApartmentSponsorship extends Model
{
    protected $table = 'apartment_sponsorship';
    
    protected $fillable = [
        'apartment_id', 'sponsorship_id', 'start', 'end'
    ];
}
