<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sponsorship;

class Apartment extends Model
{   
    protected $fillable = [
        'title', 'price', 'description', 'cover_image', 'latitude', 'longitude', 'address', 'rooms', 'beds', 'bathrooms', 'mq2', 'is_visible', 'slug', 'id_user'
    ];

    public function service()
    {
        return $this->belongsToMany('App\Models\Service');
    }

    public function message()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function image()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function view()
    {
        return $this->hasMany('App\Models\View');
    }

    public function sponsorship()
    {
        return $this->belongsToMany('App\Models\Sponsorship');
    }
}
