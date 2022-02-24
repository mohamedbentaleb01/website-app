<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    
    public function user() {
        return $this->belongsTo(User::class);
    }

    // public function image() {
    //     return $this->hasMany(Image::class);
    // }

    public function image() {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function categories(){
        return $this->hasMany(PostCategorie::class);
    }

}
