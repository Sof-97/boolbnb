<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;

class Service extends Model
{
   public function apartment(){
    return $this->belongsToMany('./Apartment.php');
   }
}
