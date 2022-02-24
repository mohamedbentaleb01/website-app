<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $fillable = ['user_id', 'event_id'];

    use HasFactory;

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

}
