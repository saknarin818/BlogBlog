<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'content' => 'required',
            'name' => 'required',
        ]);

        Comment::create([
            'blog_id' => $request->blog_id,
            'content' => $request->content,
            'name' => $request->name, // แก้ไขตรงนี้เพื่อรับชื่อของผู้แสดงความเห็น

            // หากต้องการเพิ่มฟิลด์อื่นๆ ของความคิดเห็นให้เพิ่มตามต้องการ
        ]);

        return back()->with('success', 'เพิ่มความคิดเห็นเรียบร้อยแล้ว');
    }


    public function detail($id)
    {
        $comments = Comment::where('blog_id', $id)->get();
        $blog = Blog::findOrFail($id); // Fetch the blog associated with the comments
        return view('detail', ['comments' => $comments, 'blog' => $blog]);
    }

}
