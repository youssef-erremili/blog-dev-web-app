<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Save;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function overview()
    {
        // get follower and following
        $users = User::with(['following.author', 'followers.follower'])->find(Auth::id());
        $posts = Post::where('status', 'published')->where('user_id', Auth::id())->count();
        $pending = Post::where('status', 'draft')->where('user_id', Auth::id())->count();
        $topArticle = Post::where('status', 'published')->where('user_id', Auth::id())->where('views', '>', 0)->orderBy('views', 'desc')->take(10)->get();
        return view('dashboard.overview', compact('users', 'posts', 'pending', 'topArticle'));
    }

    public function article()
    {
        // get author article
        $posts = Post::where('user_id', Auth::user()->id)->latest()->paginate('10');
        // get user saved article
        $saves = Save::with(['savers', 'article'])->where('user_id', Auth::id())->get();
        return view('dashboard.article', compact('posts', 'saves'));
    }
}
