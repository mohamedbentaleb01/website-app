<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategorie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['post_id', 'category_id'];

    public function posts(){
        return $this->belongsToMany('App\Models\Post');
    }

    public function categories() {
        return $this->belongsTo('App\Models\Categorie');
    }

    // get relationcategoryname
    public function getCategorieName(){
        return Categorie::where('id', $this->category_id)->get();  
    }
}
