<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
protected $guarded=[];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function catogry(){
        return $this->belongsTo(Catogry::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
