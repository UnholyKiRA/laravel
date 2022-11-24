<?php

namespace App\Models;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
   
   
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='post';
    // protected $fillabe=['title','content'];
    protected $guarded = [];  



    use HasFactory;
    public function user(){
        return $this->belongsto('App\Models\User');
    }

    public function photos(){

        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function tags(){

        return $this->morphToMany('App\Models\Tag','taggable');
    }
}
