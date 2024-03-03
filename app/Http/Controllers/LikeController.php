<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Blog;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $like = new Like();
        $like->user_id = $request->user_id;
        $like->blog_id = $request->blog_id;
        $like->save();

        return redirect()->back()->with('success', 'You liked this post');
    }
}
