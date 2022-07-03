<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\Apartment;

class User extends Model
{
    public function review(){
        return $this->hasMany('./Review.php');
    }

    public function apartment(){
        return $this->hasMany('./Apartment.php');
    }
}
