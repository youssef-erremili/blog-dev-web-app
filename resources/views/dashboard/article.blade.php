<x-dashboard>
    @if (session('artcilepublished'))
        <x-alert-success action="success" message="{{ session('artcilepublished') }}"/>
    @elseif (session('artcileNotpublished'))
        <x-alert-error action="error" message="{{ session('artcileNotpublished') }}"/>
    @endif
    <x-breadcrumb />
    <div class="flex items-start justify-between relative">
        <section>
            <h1 class="capitalize font-semibold text-2xl text-slate-800">article overview</h1>
            <p class="text-sm text-gray-500 my-2">Manage your articles and articles settings.</p>
        </section>
        <section>
            <a class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-indigo-600 border-2 border-white rounded-lg focus:ring-2 focus:ring-indigo-600" href="{{ route('publish-blog.create') }}" target="_blank">
                New article
                <img class="w-3.5 h-3.5 ms-2 rtl:rotate-180" src="{{ asset('images/arrow.svg') }}" alt="icon arrow">
            </a>
        </section>
    </div>
    <div class="my-10" x-data="{ model: false }">
        <div class="-m-1.5">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase">article</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">title</th>
                                <th scope="col" class="px-2 py-3 text-start text-xs font-medium text-gray-500 uppercase">content</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">status</th>
                                <th scope="col" class="px-3 py-3 text-start text-xs font-medium text-gray-500 uppercase">views</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">cover</th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($posts as $post)
                                <tr x-data="{ open: false }">
                                    <td class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                                        {{ Str::limit($post->title, 25, '...') }}
                                    </td>
                                    <td class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                                        {{ Str::limit($post->content, 45, '...') }}
                                    </td>
                                    <td class="text-gray-800 px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <span class="{{ $post->status == 'draft' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }} rounded-3xl capitalize py-1 px-3.5">{{ $post->status }}</span>
                                    </td>
                                    <td class="flex items-center text-gray-600 px-3 py-4 whitespace-nowrap text-sm font-medium">
                                        <img src="{{ asset('images/eye-dark.svg') }}" class="size-4 mr-1" alt="icon">
                                        {{ $post->views }}
                                    </td>
                                    <td class="px-6 py-4"><img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $post->article_cover) }}" alt="{{ $post->title }}"></td>
                                    <td class="py-4 whitespace-nowrap text-center text-sm font-medium relative">
                                        <button type="button" @click="open = ! open" class="w-7 border border-gray-300 rounded-md p-1">
                                            <img src="{{ asset('images/dots.svg') }}" alt="dots svg">
                                        </button>
                                        <div x-show="open" @click.outside="open = false" x-transition class="bg-white border shadow-md rounded-md absolute z-50 top-6 -left-16">
                                            <ul>
                                                @if ($post->status === 'published')
                                                    <li class="py-3 px-6 my-0.5">
                                                        <x-url-reader :$post class="flex items-center capitalize font-medium text-sm text-slate-500">
                                                            <ion-icon class="text-lg mr-3" name="reader-outline"></ion-icon>
                                                            read
                                                        </x-url-reader>
                                                    </li>
                                                @endif
                                                <li class="py-3 px-6 my-0.5">
                                                    <a class="flex justify-center items-center capitalize font-medium text-sm text-slate-500"
                                                        href="{{ route('publish-blog.edit', ['post' => $post->id]) }}"
                                                        target="_blank">
                                                        <ion-icon class="text-lg mr-3" name="refresh-outline"></ion-icon>
                                                        update
                                                    </a>
                                                </li>
                                                <li class="py-3 px-6 my-0.5">
                                                    <button type="button" @click="model = ! model"
                                                        class="flex justify-center items-center capitalize font-medium text-sm text-red-600">
                                                        <ion-icon class="text-lg mr-3" name="trash-outline"></ion-icon>
                                                        delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                        <tbody>
                            <tr class="text-center">
                                <td colspan="6" class="py-10 text-lg">no post yet</td>
                            </tr>
                        </tbody>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="my-6 w-2/3 mx-auto flex justify-center">
            {{ $posts->links() }}
        </div>
        @isset($post)
            <x-form action="{{ route('publish-blog.delete', ['post' => $post->id]) }}">
                @method('DELETE')
                <x-model></x-model>
            </x-form>
        @endisset
    </div>
    <div class="py-6 px-7 mt-20 border rounded-md">
        <div class="flex justify-between">
            <h1 class="font-medium text-2xl first-letter:capitalize text-gray-700">Articles you saved</h1>
            <h3 class="text-gray-700 font-medium">Saved items : {{ $saves->count() }}</h3>
        </div>
        <div class="my-10">
            @forelse ($saves as $save)
                <x-save-article :save="$save" :loop="$loop->iteration" />
            @empty
                <p class="text-base text-slate-600 font-medium text-center mt-10">No articles saved yet</p>
            @endforelse
        </div>
    </div>
</x-dashboard>
