<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use App\Models\Save;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use SHTayeb\Bookworm\Bookworm;

class PublishBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('status', 'published')
            ->where('user_id', Auth::user()->id)
            ->latest()
            ->limit(6)
            ->get();

        $reading_time = [];
        foreach ($posts as $post) {
            $reading_time[] = (new Bookworm())->estimate($post->content);
        }

        return view('dashboard.publish-blog', compact('posts', 'reading_time'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate user topic elements
        $request->validate([
            'title' => ['required', 'min:10', 'max:5000'],
            'content' => ['required', 'min:10'],
            'status' => ['in:draft,published'],
            'category' => ['required'],
            'article_cover' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:6048'],
            'tag1' => ['required', 'string'],
            'tag2' => ['required', 'string'],
            'tag3' => ['required', 'string'],
            'tag4' => ['required', 'string'],
            'tag5' => ['required', 'string'],
        ]);

        // move image
        $image = time() . '.' . $request->file('article_cover')->extension();
        $path = $request->file('article_cover')->storeAs('article_cover', $image, 'public');

        // Save post data in DB
        $user = User::find(Auth::user()->id);
        $isArticleSaved =  $user->posts()->create([
            'title' => trim($request->input('title')),
            'content' => trim($request->input('content')),
            'status' => trim($request->input('status')),
            'category' => trim($request->input('category')),
            'article_cover' => $path,
            'tag1' => trim($request->input('tag1')),
            'tag2' => trim($request->input('tag2')),
            'tag3' => trim($request->input('tag3')),
            'tag4' => trim($request->input('tag4')),
            'tag5' => trim($request->input('tag5')),
        ]);
        if ($isArticleSaved) {
            return redirect()->back()->with('artcilepublished', 'your article has been published successfully');
        } else {
            return redirect()->back()->with('artcileNotpublished', 'something went wrong to publish your article');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::where('status', 'published')->findOrFail($id);
        $author = User::findOrFail($post->user->id);
        if ($post->views >= 30) {
            $feature = new Post;
            $feature->featured = true;
            $feature->update();
        }

        $preventfollow = false;
        $author_id = $post->user->id;

        if ($post->status == 'draft') {
            return redirect()->route('home');
        }

        // Check if the article is already saved by the user
        $alreadySaved = Save::where('user_id', Auth::id())
            ->where('post_id', $post->id)
            ->first();

        //Check if the user already follow this author
        $alreadyFollowing = Follow::where('follower_id', Auth::id())
            ->where('author_id', $author_id)
            ->first();
        if ($alreadyFollowing) {
            $preventfollow = true;
        }

        // Track the visit
        $post->views();

        $reading_time = (new Bookworm())->estimate($post->content);
        return view('dashboard.read-article', compact(['post', 'reading_time', 'alreadySaved', 'preventfollow', 'alreadyFollowing']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (Gate::allows('update', $post)) {
            return view('dashboard.edit-article', compact('post'));
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if (Gate::allows('update', $post)) {
            $old_article_cover = $post->article_cover;
            $path = null;
            $request->validate([
                'title' => ['required', 'min:30', 'max:150'],
                'content' => ['required', 'min:10', 'max:20000'],
                'status' => ['in:draft,published'],
                'category' => ['required'],
                'article_cover' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'tag1' => ['required', 'string'],
                'tag2' => ['required', 'string'],
                'tag3' => ['string', 'nullable'],
                'tag4' => ['string', 'nullable'],
                'tag5' => ['string', 'nullable'],
            ]);

            if ($request->hasFile('article_cover')) {
                // delete first image then update
                Storage::disk('public')->delete($old_article_cover);
                $image = time() . '.' . $request->file('article_cover')->extension();
                $path = $request->file('article_cover')->storeAs('article_cover', $image, 'public');
            } else {
                $path = $old_article_cover;
            }

            $isArticleUpdated = Post::where('id', $post->id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'status' => $request->status,
                'category' => $request->category,
                'article_cover' => $path,
                'tag1' => $request->tag1,
                'tag2' => $request->tag2,
                'tag3' => $request->tag3,
                'tag4' => $request->tag4,
                'tag5' => $request->tag5,
            ]);

            if ($isArticleUpdated) {
                return redirect()->back()->with('artcilepublished', 'your article has been updated successfully');
            } else {
                return redirect()->back()->with('artcileNotpublished', 'something went wrong to publish your article');
            }
        } else {
            return back()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        Gate::allows('delete', $post);
        if ($post) {
            $post->delete();
            return redirect()->back()->with('artcilepublished', 'your article has been deleted successfully');
        } else {
            return redirect()->back()->with('artcileNotpublished', 'omething went wrong to delete your article');
        }
    }
}
