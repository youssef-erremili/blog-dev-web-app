<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
                    ->limit(3)
                    ->get();
        return view('dashboard.publish-blog', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate user topic elements
        $request->validate([
            'title' => ['required', 'min:10', 'max:80'],
            'content' => ['required', 'min:10', 'max:10000'],
            'status' => ['required', 'in:draft,published'],
            'articale_cover' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'tag1' => ['required', 'string', 'nullable', 'max:8'],
            'tag2' => ['required', 'string', 'nullable', 'max:8'],
            'tag3' => ['required', 'string', 'nullable', 'max:8'],
            'tag4' => ['required'],
            'tag5' => ['required'],
        ]);

        // move image
        $image = time() . '.' . $request->file('articale_cover')->extension();
        $path = $request->file('articale_cover')->storeAs('articale_cover', $image, 'public');
        
        // Save post data in DB
        Auth::user()->posts()->create([
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

        return redirect()->back();
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id, Post $post)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.edit-article', compact('post'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $old_articale_cover = $post->articale_cover;
        $path = null;
        $data = $request->validate([
            'title' => ['required', 'min:10', 'max:80'],
            'content' => ['required', 'min:10', 'max:10000'],
            'status' => ['required', 'in:draft,published'],
            'articale_cover' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'tag1' => ['required', 'string', 'nullable', 'max:8'],
            'tag2' => ['required', 'string', 'nullable', 'max:8'],
            'tag3' => ['string', 'nullable', 'max:8'],
            'tag4' => ['string', 'nullable', 'max:8'],
            'tag5' => ['string', 'nullable', 'max:8'],
        ]);
        if ($request->hasFile('articale_cover')) {
            // C:\Users\Youssef\Desktop\blog-dev\public\storage\articale_cover\1731886429.png
            if (Storage::exists('public/' . $old_articale_cover)) {
                // dd('true path exists');
                Storage::disk("public")->delete('public/' . $old_articale_cover);
                // $image = time() . '.' . $request->file('articale_cover')->extension();
                // $path = $request->file('articale_cover')->storeAs('articale_cover', $image, 'public');
                // dd($path, 'it has new file');
            }
            else{
                dd('does not exists');
            }
        } else {
            dd($old_articale_cover, 'it just the old file');
        }
        
        // dd($path);
        // Update post data in DB
        // $post->update($data);

        return redirect()->back('dashboard/article');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}