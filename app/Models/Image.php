<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = [
        'path'
    ];


    use HasFactory;
    // use SoftDeletes;

    // public function post() {
        
    //     return $this->belongsTo(Post::class);
    // }

    public function imageable() {
        return $this->morphTo();
    }


    public function url() {
        return Storage::url($this->path);
    }

    public function getEventImages() {
        return Storage::url($this->imageable->path);
    }
}
