<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use App\Models\Save;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Errehub\LaravelAlert\AlertFacade as Notifier;

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


    // this function is for saving id's of users and id's of post in saves table
    public function saveArticle(string $id)
    {
        //Save the article in DB
        $post = Post::findOrfail($id);
        $saved = Save::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ]);
        if ($saved) {
            Notifier::success('Article has been saved successfully');
            return redirect()->back();
        } else {
            Notifier::warning('Article has not saved successfully');
            return redirect()->back();
        }
    }

    // delete article

    public function deleteArticle(string $id)
    {
        // get id of saving article
        $saved_item = Save::findOrfail($id);
        $is_saved_item = $saved_item->delete();
        if ($is_saved_item) {
            Notifier::info('Article unsaved successfully');
            return redirect()->back();
        } else {
            Notifier::warning('Saved article is not deleted');
            return redirect()->back();
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
            Notifier::success('You start following ' . $followed->name);
            return redirect()->back();
        } else {
            Notifier::warning('Something went wrong, Please try again later');
            return redirect()->back();
        }
    }

    // unfollow 
    public function unFollow($followId){
        $is_follow_removed = Follow::findOrfail($followId)->delete();
        if ($is_follow_removed) {
            Notifier::info('Follow has been removed');
            return redirect()->back();
        } 
    }
}


// Check if the user is trying to follow themselves
// if ($user->id === $author_id) {
//     return response()->json(['message' => 'You cannot follow yourself.']);
// }