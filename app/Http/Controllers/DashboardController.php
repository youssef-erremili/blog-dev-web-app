<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use App\Models\Save;
use App\Models\User;
use Illuminate\Http\Request;
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
        $posts = Post::where('status', 'published')->where('user_id', Auth::id())->get();
        $pending = Post::where('status', 'draft')->where('user_id', Auth::id())->get();
        // $counter_views = Post::popularAllTime()->where('user_id', Auth::id())->first()->visit_count_total;
        // return view('dashboard.overview', compact('users', 'posts', 'pending', 'counter_views'));
        return view('dashboard.overview', compact('users', 'posts', 'pending'));
    }

    public function article()
    {
        // get author article
        $posts = Post::where('user_id', Auth::user()->id)->latest()->paginate('10');
        // get user saved article
        $saves = Save::with(['savers', 'article'])->where('user_id', Auth::id())->get();
        return view('dashboard.article', compact('posts', 'saves'));
    }


    // this function is for saving id's of users and id's of post in saves table
    public function saveArticle(string $id)
    {
        //Save the article in DB
        $post = Post::findOrfail($id);
        $post->visit()->withUser(); // Track the visit
        $saved = Save::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ]);
        if ($saved) {
            return redirect()->back()->with('successMsg', 'article has been saved successfully');
        } else {
            return redirect()->back()->with('errorMsg', 'article has not saved successfully');
        }
    }

    // delete article

    public function deleteArticle(string $id)
    {
        // get id of saving article
        $saved_item = Save::findOrfail($id);
        $is_saved_item = $saved_item->delete();
        if ($is_saved_item) {
            return redirect()->back()->with('successMsg', 'saved article deleted successfully');
        } else {
            return redirect()->back()->with('errorMsg', 'saved article is not deleted successfully');
        }
    }

    // add follow
    public function follow($authorId)
    {
        $followed = User::findOrfail($authorId);
        $isFollowed = Follow::create([
            'author_id' => $followed->id,
            'follower_id' => Auth::id()
        ]);
        if ($isFollowed) {
            return redirect()->back()->with('successMsg', 'you are now follow ' . $followed->name);
        } else {
            return redirect()->back()->with('errorMsg', 'article has not saved successfully');
        }
    }

    // unfollow 
    public function unFollow($followId){
        $follow = Follow::findOrfail($followId);
        $is_follow = $follow->delete();
        if ($is_follow) {
            return redirect()->back()->with('successMsg', 'you remove your follow');
        } 
    }
}


// Check if the user is trying to follow themselves
// if ($user->id === $author_id) {
//     return response()->json(['message' => 'You cannot follow yourself.']);
// }