<?php

namespace App\Http\ViewComposers;

use App\Models\Categorie;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class ActivityComposer {

    public function compose(View $view) {


        $AllCategories = Categorie::all(); 

        $ActiveUsers = User::withCount('posts')->orderBy('posts_count','desc')->take(3)->get();

        $lastCommented = Comment::latest()->first();

        $MostPostCommented = Post::withCount('comments')->orderBy('comments_count', 'desc')->take(3)->get();

        $latestEvent = Event::latest()->first();


        $view->with([
            'categories' => $AllCategories,
            'users' => $ActiveUsers,
            'lastCommented' => $lastCommented,
            'MostPostCommented' => $MostPostCommented,
            'latestEvent' => $latestEvent, 
        ]);

    }
}