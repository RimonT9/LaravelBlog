<?php

namespace App\Http\Controllers\Post\Comment\Like;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(Comment $post)
    {   
        auth()->user()->likedMessages()->toggle($post->message->id);
        
        return redirect()->route('post.show', $post->post->id);  
    }
}
