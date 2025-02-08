<x-app-layout>
    @if (session('artcilepublished'))
        <x-alert-success action="success" message="{{ session('artcilepublished') }}"/>
    @elseif (session('artcileNotpublished'))
        <x-alert-error action="error" message="{{ session('artcileNotpublished') }}"/>
    @endif
    <div class="py-5 px-14">
        <h1 class="text-3xl text-slate-700 font-bold capitalize my-2">Dashboard's {{ Auth::user()->name }}</h1>
        <x-form action="{{ route('publish-blog.update', ['post' => $post->id]) }}">
            @method('PUT')
            <div class="mt-10 border border-gray-300 rounded-lg py-4 px-10">
                <div class="mt-6">
                    <label for="title" class="block text-slate-800 font-medium my-1 text-[17px] capitalize">article title :</label>
                    <input type="text" name="title" value="{{ $post->title }}" placeholder="choose a title to grap user intention" class="py-3 px-4 w-full outline-none border rounded-md focus:ring-1 placeholder:capitalize focus:border-indigo-500 focus:ring-indigo-500" id="title">
                </div>
                <div class="mt-6">
                    <label for="content" class="block text-slate-800 font-medium my-1 text-[17px] capitalize">article content :</label>
                    <textarea name="content" id="content" placeholder="bring all your ideas to this blog" class="resize-none py-3 px-4 w-full outline-none border rounded-md focus:ring-1 placeholder:capitalize focus:border-indigo-500 focus:ring-indigo-500" cols="30" rows="10">{{ $post->content }}</textarea>
                </div>
                <div class="mt-6">
                    <label for="article_cover" class="block text-slate-800 font-medium my-1 text-[17px] capitalize">article cover :</label>
                    <div class="flex justify-between">
                        <div class="flex flex-wrap items-center">
                            <div class="">
                                <span class="overflow-hidden rounded-md flex shrink-0 w-48 h-32 cursor-pointer">
                                    <img class="rounded-lg object-cover" id="imagePreview" src="{{ asset('storage/' . $post->article_cover) }}" alt="articale cover">
                                </span>
                            </div>
                            <div class="mx-2">
                                <div class="flex items-center gap-x-2 relative overflow-hidden">
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg cursor-pointer border border-transparent bg-blue-600 text-white">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            <polyline points="17 8 12 3 7 8"></polyline>
                                            <line x1="12" x2="12" y1="3" y2="15"></line>
                                        </svg>
                                        Upload photo
                                    </button>
                                    <input type="file" class="absolute z-40 opacity-0 cursor-pointer file:cursor-pointer w-32" name="article_cover" id="profile_picture">
                                    <button type="button" class="py-2 z-50 px-3 inline-flex items-center gap-x-2 text-xs font-semibold rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <label for="status" class="block text-slate-800 font-medium my-1 text-[17px] capitalize">blog status :</label>
                    <select name="status" id="status" class="cursor-pointer capitalize font-medium font-sans py-3 px-4 pe-9 block w-full border border-gray-200 rounded-lg text-sm outline-none focus:border-blue-500 focus:ring-blue-500">
                        <option hidden selected>select status</option>
                        <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>draft</option>
                        <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>publish</option>
                    </select>
                </div>
                <div class="mt-6">
                    <label for="category" class="block text-slate-800 font-medium my-1 text-[17px] capitalize">select category :</label>
                    <select name="category" id="category" class="cursor-pointer capitalize font-medium font-sans py-3 px-4 pe-9 block w-full border border-gray-200 rounded-lg text-sm outline-none focus:border-blue-500 focus:ring-blue-500">
                        <option value="{{ $post->category }} selected">{{ $post->category }}</option>
                    </select>
                </div>
                <div class="mt-6">
                    <label for="tag-container" class="block text-slate-800 font-medium my-1 text-[17px] capitalize">article tags :</label>
                    <div class="inline-block" id="tag-container">
                        <input type="text" value="{{ $post->tag1 }}" class="text-slate-800 py-2 text-center mx-1 px-2.5 w-[6rem] outline-none select-none rounded-md font-medium capitalize border text-sm bg-white focus:border-none ring-2 ring-indigo-600 " placeholder="tag" name="tag1">
                        <input type="text" value="{{ $post->tag2 }}" class="text-slate-800 py-2 text-center mx-1 px-2.5 w-[6rem] outline-none select-none rounded-md font-medium capitalize border text-sm bg-white focus:border-none ring-2 ring-indigo-600 " placeholder="tag" name="tag2">
                        <input type="text" value="{{ $post->tag3 }}" class="text-slate-800 py-2 text-center mx-1 px-2.5 w-[6rem] outline-none select-none rounded-md font-medium capitalize border text-sm bg-white focus:border-none ring-2 ring-indigo-600 " placeholder="tag" name="tag3">
                        <input type="text" value="{{ $post->tag4 }}" class="text-slate-800 py-2 text-center mx-1 px-2.5 w-[6rem] outline-none select-none rounded-md font-medium capitalize border text-sm bg-white focus:border-none ring-2 ring-indigo-600 " placeholder="tag" name="tag4">
                        <input type="text" value="{{ $post->tag5 }}" class="text-slate-800 py-2 text-center mx-1 px-2.5 w-[6rem] outline-none select-none rounded-md font-medium capitalize border text-sm bg-white focus:border-none ring-2 ring-indigo-600 " placeholder="tag" name="tag5">
                    </div>
                    <div class="mt-6"> 
                        <div class="flex items-center p-4 mb-4 text-sm text-blue-900 rounded-lg bg-blue-100 dark:text-blue-500" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="flex">
                                <span class="font-extrabold mr-1">Info!</span> 
                                <p id="msg">Each topic can have up to five tags. Get creative!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <x-button-primary class="rounded-md">update article</x-button-primary>
                </div>
            </div>
        </x-form>
    </div>
</x-app-layout>