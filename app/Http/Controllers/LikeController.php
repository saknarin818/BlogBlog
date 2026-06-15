<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Unlike;
use App\Models\Blog;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $userId = $request->user_id;
        $blogId = $request->blog_id;

        // Check if the user has already liked this post
        $existingLike = Like::where('user_id', $userId)->where('blog_id', $blogId)->first();

        if ($existingLike) {
            // Toggle off: remove the like
            $existingLike->delete();
            $message = 'You unliked this post';
        } else {
            // Remove unlike/dislike if it exists
            Unlike::where('user_id', $userId)->where('blog_id', $blogId)->delete();

            // Save the new like
            $like = new Like();
            $like->user_id = $userId;
            $like->blog_id = $blogId;
            $like->save();
            $message = 'You liked this post';
        }

        return redirect()->back()->with('success', $message);
    }
}
