<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        // Trending posts — top 6 by views (with reading time)
        $trendingPosts = Post::with('user')
                            ->where('status', 'published')
                            ->orderBy('views', 'desc')
                            ->take(6)
                            ->get();

        $trending_reading_time = [];
        foreach ($trendingPosts as $post) {
            $trending_reading_time[] = (new Bookworm())->estimate($post->content);
        }

        // Distinct categories with post counts
        $categories = Post::where('status', 'published')
                            ->whereNotNull('category')
                            ->select('category', DB::raw('count(*) as posts_count'))
                            ->groupBy('category')
                            ->orderByDesc('posts_count')
                            ->get();

        // Top authors — users with most published posts
        $topAuthors = User::withCount(['posts' => function ($query) {
                            $query->where('status', 'published');
                        }])
                        ->withCount('followers')
                        ->having('posts_count', '>', 0)
                        ->orderByDesc('posts_count')
                        ->take(4)
                        ->get();

        return view('index', compact(
            'topArticle', 'lastPost', 'reading_time',
            'trendingPosts', 'trending_reading_time',
            'categories', 'topAuthors'
        ));
    }

    // search method in DB
    public function search(Request $request)
    {
        $query = $request->search;
        if ($query === null) {
            Notifier::warning('Make sure to fill in the search field!');
            return redirect()->back();
        }

        $lastPost = Post::where('status', 'published')
                            ->where('views', '>', 0)
                            ->orderBy('views', 'desc')
                            ->latest()
                            ->paginate(6);

        $reading_time = [];
        foreach ($lastPost as $post) {
            $reading_time[] = (new Bookworm())->estimate($post->content);
        }


        return view('search', compact('query', 'lastPost', 'reading_time'));
    }
}
