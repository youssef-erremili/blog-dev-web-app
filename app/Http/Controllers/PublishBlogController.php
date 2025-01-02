<?php

namespace App\Http\Controllers;

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
        return view('dashboard.publish-blog', compact('posts'));
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
            'status' => ['required', 'in:draft,published'],
            'articale_cover' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:6048'],
            'tag1' => ['required', 'string'],
            'tag2' => ['required', 'string'],
            'tag3' => ['required', 'string'],
            'tag4' => ['required', 'string'],
            'tag5' => ['required', 'string'],
        ]);

        // move image
        $image = time() . '.' . $request->file('articale_cover')->extension();
        $path = $request->file('articale_cover')->storeAs('articale_cover', $image, 'public');

        // Save post data in DB
        $isArticleSaved =  Auth::user()->posts->create([
            'title' => trim($request->input('title')),
            'content' => trim($request->input('content')),
            'status' => trim($request->input('status')),
            'articale_cover' => $path,
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
        
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = $article = Post::findOrfail($id);
        $post = Post::where('status', 'published')->findOrFail($id);
        if ($post->status == 'draft') {
            return redirect()->route('home');
        }

        // Check if the article is already saved by the user
        $alreadySaved = Save::where('user_id', Auth::id())
            ->where('post_id', $article->id)
            ->first();    

        $reading_time = (new Bookworm())->estimate($post->content);
        return view('dashboard.read-article', compact(['post', 'reading_time', 'alreadySaved']));
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
            $old_articale_cover = $post->articale_cover;
            $path = null;
            $request->validate([
                'title' => ['required', 'min:30', 'max:150'],
                'content' => ['required', 'min:10', 'max:20000'],
                'status' => ['in:draft,published'],
                'articale_cover' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'tag1' => ['required', 'string'],
                'tag2' => ['required', 'string'],
                'tag3' => ['string', 'nullable'],
                'tag4' => ['string', 'nullable'],
                'tag5' => ['string', 'nullable'],
            ]);
            if ($request->hasFile('articale_cover')) {
                $image = time() . '.' . $request->file('articale_cover')->extension();
                $path = $request->file('articale_cover')->storeAs('articale_cover', $image, 'public');
            } else {
                $path = $old_articale_cover;
            }

            $isArticleUpdated = Post::where('id', $post->id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'status' => $request->status,
                'articale_cover' => $path,
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
    public function destroy(string $id, Post $post)
    {
        Gate::allows('delete', $post);
        $post = Post::findOrFail($id);
        if ($post) {
            $post->delete();
        } else {
            dd('not delete');
        }
    }
}
