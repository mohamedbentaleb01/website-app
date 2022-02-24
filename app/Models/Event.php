<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    protected $fillable = [
        'title', 'content', 'plannified_at'
    ];

    public $term;
    
    use HasFactory;

    public function image() {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function cotisations() {
        return $this->hasMany(Cotisation::class);
    }

    public function participations() {
        return $this->hasMany(Participation::class);
    }


    
}
