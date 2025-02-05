<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use SHTayeb\Bookworm\Bookworm;
use Errehub\LaravelAlert\AlertFacade as Notifier;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topArticle = Post::where('status', 'published')
            ->where('views', '>', 0)
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        $lastPost = Post::where('status', 'published')
            ->where('views', '>', 0)
            ->orderBy('views', 'desc')
            ->latest()
            ->paginate(9);

        $reading_time = [];
        foreach ($lastPost as $post) {
            $reading_time[] = (new Bookworm())->estimate($post->content);
        }
        
        return view('index', compact('topArticle', 'lastPost', 'reading_time'));
    }

    // search method in DB

    public function search(Request $request)
    {
        $result = 'jjdjjd';
        $query = $request->search;
        return view('index', compact('result'));
        dd($query);
    }
}
