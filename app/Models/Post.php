<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    // protected $table = 'posts';
    // protected $primaryKey = 'post_id';
    protected $dates = ['deleted_at'];

    protected $fillable=[
        "title",
        "content" ,
    ];

    //function for inverse relationship
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function photos(){
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function tags(){
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

}
