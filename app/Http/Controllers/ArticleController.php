<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Post;
use App\Models\Save;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Errehub\LaravelAlert\AlertFacade as Notifier;

class ArticleController extends Controller
{

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
    public function Follow(string $authorId)
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
    public function unFollow(string $followId)
    {
        $is_follow_removed = Follow::findOrfail($followId)->delete();
        if ($is_follow_removed) {
            Notifier::info('Follow has been removed');
            return redirect()->back();
        }
    }

    public function Like(string $id)
    {
        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->post_id = $id;
        $isDone =  $like->save();
        if ($isDone) {
            Notifier::success('Thank for liking this post Mr ' . Auth::user()->name);
            return redirect()->back();
        } else {
            Notifier::warning('Something went wrong, Please try again later');
            return redirect()->back();
        }
    }

    public function Dislike(string $id)
    {
        $like = Like::where('post_id', $id)->where('user_id', Auth::user()->id)->first();
        if ($like) {
            $like->delete();
            Notifier::info('Like has been removed');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
