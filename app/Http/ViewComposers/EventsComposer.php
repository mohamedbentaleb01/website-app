<?php

namespace App\Http\ViewComposers;

use App\Models\Categorie;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Participation;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EventsComposer {

    public function compose(View $view) {

      


        $view->with([
            
        ]);

    }
}