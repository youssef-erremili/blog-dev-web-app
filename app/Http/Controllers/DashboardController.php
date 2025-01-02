<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        // get author article
        $posts = Post::where('user_id', Auth::user()->id)->latest()->paginate('4');
        // get user saved article
        $saves = Save::with(['savers', 'article'])->where('user_id', Auth::id())->get();
        return view('dashboard.article', compact('posts', 'saves'));
    }


    // this function is for saving id's of users and id's of post in saves table
    public function savedArticle(string $id)
    {
        //Save the article in DB
        $article = Post::findOrfail($id);
        $saved = Save::create([
            'user_id' => Auth::id(),
            'post_id' => $article->id
        ]);
        if ($saved) {
            return redirect()->back()->with('articleSaved', 'article has been saved successfully');
        } else {
            return redirect()->back()->with('articleNotsaved', 'article has not saved successfully');
        }
    }

    // delete article

    public function deleteArticle(string $id)
    {
        // get id of saving article
        $saved_item = Save::findOrfail($id);
        $is_saved_item = $saved_item->delete();
        if ($is_saved_item) {
            return redirect()->back()->with('deleted', 'saved article deleted successfully');
        } else {
            return redirect()->back()->with('notDeleted', 'saved article is not deleted successfully');
        }
    }

    
}