<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public function posts(){
        return $this->hasManyThrough('App\Models\Post','App\Models\User','country_id');
    }
}
