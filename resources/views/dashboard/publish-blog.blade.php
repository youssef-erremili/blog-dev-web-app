<x-index-layout>
    @if (session('artcilepublished'))
        <x-alert-success action="success" message="{{ session('artcilepublished') }}"/>
    @elseif (session('artcileNotpublished'))
        <x-alert-error action="error" message="{{ session('artcileNotpublished') }}"/>
    @endif
    <div class="py-5 px-14">
        <x-title-author>Dashboard's {{ Auth::user()->name }}</x-title-author>
        <x-form action="{{ route('publish-blog.store') }}">
            @method('POST')
            <div class="mt-10 border border-gray-300 rounded-lg py-4 px-10">
                <div class="mt-6">
                    <label for="title" class="block text-slate-800 font-medium my-1 text-[17px]">blog title :</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="choose a title to grap user intention" class="py-3 px-4 w-full outline-none border rounded-md focus:ring-1 placeholder:capitalize focus:border-indigo-500 focus:ring-indigo-500" id="title">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-6">
                    <label for="content" class="block text-slate-800 font-medium my-1 text-[17px]">blog content :</label>
                    <textarea name="content" id="content" placeholder="bring all your ideas to this blog" class="resize-none py-3 px-4 w-full outline-none border rounded-md focus:ring-1 placeholder:capitalize focus:border-indigo-500 focus:ring-indigo-500" cols="30" rows="10">{{ old('content') }}</textarea>
                    @error('content')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-6">
                    <label for="articale_cover" class="block text-slate-800 font-medium my-1 text-[17px]">blog cover :</label>
                    <span class="sr-only cursor-pointer">Choose profile photo</span>
                    <input type="file" id="articale_cover" name="articale_cover" value="{{ old('articale_cover') }}" class="block w-full text-sm text-gray-500 border cursor-pointer border-gray-200 rounded-xl
                        file:me-4 file:py-3 file:px-4
                        file:rounded-s-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-600 file:text-white
                        hover:file:bg-blue-700
                        file:disabled:opacity-50 file:disabled:pointer-events-none">
                    @error('articale_cover')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-6">
                    <label for="status" class="block text-slate-800 font-medium my-1 text-[17px]">blog status :</label>
                    <select name="status" id="status" class="cursor-pointer capitalize font-medium font-sans py-3 px-4 pe-9 block w-full border border-gray-200 rounded-lg text-sm outline-none focus:border-blue-500 focus:ring-blue-500">
                        <option hidden selected>select status</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>draft</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>publish</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-6">
                    <label for="tag-container" class="block text-slate-800 font-medium my-1 text-[17px]">blog tags :</label>
                    <div class="inline-block" id="tag-container">
                        <input type="text" class="text-slate-800 py-2 text-center mx-1 px-2.5 w-[6rem] outline-none select-none rounded-md font-medium capitalize border text-sm bg-white focus:border-none ring-2 ring-indigo-600 " placeholder="tag" name="tag1">
                        <input type="text" class="text-slate-800 py-2 text-center mx-1 px-2.5 w-[6rem] outline-none select-none rounded-md font-medium capitalize border text-sm bg-white focus:border-none ring-2 ring-indigo-600 " placeholder="tag" name="tag2">
                        <input type="text" class="text-slate-800 py-2 text-center mx-1 px-2.5 w-[6rem] outline-none select-none rounded-md font-medium capitalize border text-sm bg-white focus:border-none ring-2 ring-indigo-600 " placeholder="tag" name="tag3">
                        <input type="text" class="text-slate-800 py-2 text-center mx-1 px-2.5 w-[6rem] outline-none select-none rounded-md font-medium capitalize border text-sm bg-white focus:border-none ring-2 ring-indigo-600 " placeholder="tag" name="tag4">
                        <input type="text" class="text-slate-800 py-2 text-center mx-1 px-2.5 w-[6rem] outline-none select-none rounded-md font-medium capitalize border text-sm bg-white focus:border-none ring-2 ring-indigo-600 " placeholder="tag" name="tag5">
                    </div>
                    @error('tag5')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
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
                    <x-button-primary class="rounded-md px-5">publish</x-button-primary>
                </div>
            </div>
        </x-form>
        <div class="m-20 w-full mx-auto">
            <h1 class="text-2xl mb-6 inline-block text-slate-700 font-bold capitalize my-2 border-b-4 border-slate-700">latest posts</h1>
            <div class="flex items-center justify-between flex-wrap">
                @forelse ($posts as $post)
                    <x-card :post="$post" />
                @empty
                    <p class="text-lg text-slate-800 font-medium capitalize text-center mt-10">No articles yet</p>
                @endforelse
            </div>
        </div>
    </div>
    
</x-index-layout>