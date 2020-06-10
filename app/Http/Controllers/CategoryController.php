<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category; 
use App\Forum;
use App\Post;
use App\User;

class CategoryController extends Controller
{
    public function getCategories(Request $request)
    {
        $categories = Category::with('fora')->get();

        for ($i = 0; $i < count($categories); $i++)
        {
            $currentCategory = $categories[$i];

            for ($j = 0; $j < count($currentCategory['fora']); $j++)
            {
                $currentForum = $currentCategory['fora'][$j];
                
                $currentForum['latest'] = Post::leftJoin('threads', 'posts.thread_id', '=', 'threads.id')
                ->where('threads.forum_id', '=', $currentForum->id)
                ->latest()
                ->select('posts.*', 'threads.title as thread_title', 'threads.id as thread.id')
                ->first();
                
                $currentForum['latest']['user'] = User::find($currentForum['latest']->user_id);
               
                $currentForum['replies'] = Post::leftJoin('threads', 'posts.thread_id', '=', 'threads.id')
                ->where('threads.forum_id', '=', $currentForum->id)
                ->count();
            }
        }
        
        return response()->json($categories, 200);
    }
}