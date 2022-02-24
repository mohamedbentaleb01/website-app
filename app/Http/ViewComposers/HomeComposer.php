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

class HomeComposer {

    public function compose(View $view) {


        $myPosts = Post::where('user_id', Auth::user()->id)->get();
        $myComments = Comment::with('post')->where('user_id', Auth::user()->id)->get();
        $event = Event::with(['image'])->where('plannified_at', '>=', now() )->orderBy('plannified_at', 'asc')->first();
        $checkParticipation = Participation::where('user_id', '=', Auth::user()->id)->first();



        $view->with([
            'myPosts' => $myPosts, 
            'myComments' => $myComments,
            'event' => $event,
            'checkIdofUser' => $checkParticipation
        ]);

    }
}