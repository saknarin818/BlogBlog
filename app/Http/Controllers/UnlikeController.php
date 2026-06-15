<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unlike;
use App\Models\Like;
use App\Models\Blog;

class UnlikeController extends Controller
{
    public function unlike(Request $request)
    {
        $userId = $request->user_id;
        $blogId = $request->blog_id;

        // Check if the user has already unliked (disliked) this post
        $existingUnlike = Unlike::where('user_id', $userId)->where('blog_id', $blogId)->first();

        if ($existingUnlike) {
            // Toggle off: remove the unlike
            $existingUnlike->delete();
            $message = 'You removed your dislike';
        } else {
            // Remove like if it exists
            Like::where('user_id', $userId)->where('blog_id', $blogId)->delete();

            // Save the new unlike
            $unlike = new Unlike();
            $unlike->user_id = $userId;
            $unlike->blog_id = $blogId;
            $unlike->save();
            $message = 'You Disliked this post';
        }

        return redirect()->back()->with('success', $message);
    }
}
