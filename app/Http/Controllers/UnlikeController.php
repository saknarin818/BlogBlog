<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unlike;
use App\Models\Blog;

class UnlikeController extends Controller
{
    public function unlike(Request $request)
    {
        $unlike = new Unlike();
        $unlike->user_id = $request->user_id;
        $unlike->blog_id = $request->blog_id;
        $unlike->save();

        return redirect()->back()->with('success', 'You Disliked this post');
    }
}
