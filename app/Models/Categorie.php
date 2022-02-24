<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['name'];
    use HasFactory;

    // public function posts() {

    //     return $this->belongsTo(Post::class);
    // }

    public function postcategorie(){
        return $this->hasOne(PostCategorie::class);

    }
}
