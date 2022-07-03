<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Message;
use App\Models\Image;
use App\Models\View;
use App\Models\Sponsorship;

class Apartment extends Model
{
    public function service()
    {
        return $this->belongsToMany('./Service.php');
    }

    public function message()
    {
        return $this->hasMany('./Message.php');
    }

    public function image()
    {
        return $this->hasMany('./Image.php');
    }

    public function view()
    {
        return $this->hasMany('./View.php');
    }

    public function sponsorship()
    {
        return $this->belongsToMany('./Sponsorship.php');
    }
}
