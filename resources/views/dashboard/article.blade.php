<x-dashboard>
    @if (session('deleted'))
        <x-alert-success action="success" message="{{ session('deleted') }}"/>
    @elseif (session('notDeleted'))
        <x-alert-error action="error" message="{{ session('notDeleted') }}"/>
    @endif
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
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">article</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">title</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">content</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">status</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">cover</th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($posts as $post)
                                <tr x-data="{ open: false }">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                        {{ Str::limit($post->title, 25, '') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                        {{ Str::limit($post->content, 30, '...') }}
                                    </td>
                                    <td class="text-white px-6 py-4 whitespace-nowrap text-sm font-normal">
                                        <span class="{{ $post->status == 'draft' ? 'bg-red-500' : 'bg-indigo-600' }} rounded-full py-[1.4px] px-[12px]">{{ $post->status }}</span>
                                    </td>
                                    <td class="px-6 py-4"><img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $post->articale_cover) }}" alt="{{ $post->title }}"></td>
                                    <td class="py-4 whitespace-nowrap text-center text-sm font-medium relative">
                                        <button type="button" @click="open = ! open" class="w-7">
                                            <img src="{{ asset('images/dots.svg') }}" alt="dots svg">
                                        </button>
                                        <div x-show="open" @click.outside="open = false" x-transition class="bg-white border shadow-md rounded-md absolute z-50 top-6 -left-16">
                                            <ul>
                                                @if ($post->status === 'published')
                                                    <li class="py-3 px-6 my-0.5">
                                                        <a class="flex items-center capitalize font-medium text-sm text-slate-500"
                                                            href="{{ route('reader', ['id' => $post->id, 'writer' => str_replace(' ', '-', $post->user->name), 'title' => str_replace(' ', '-', $post->title)]) }}" target="_blank">
                                                            <ion-icon class="text-lg mr-3" name="reader-outline"></ion-icon>
                                                            read
                                                        </a>
                                                    </li>
                                                @endif
                                                <li class="py-3 px-6 my-0.5">
                                                    <a class="flex justify-center items-center capitalize font-medium text-sm text-slate-500"
                                                        href="{{ route('publish-blog.edit', ['post' => $post->id]) }}"
                                                        target="_blank">
                                                        <ion-icon class="text-lg mr-3"
                                                            name="refresh-outline"></ion-icon>
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
    <div class="bg-slate-50 rounded-lg py-6 px-7 mt-15">
        <h1 class="capitalize mt-3 mb-7 font-medium text-2xl text-slate-800">saved articles</h1>
        <div class="my-10">
            <h3>Total Posts: {{ $saves->count() }}</h3>
            @forelse ($saves as $save)
                <x-top-article save_id="{{ $save->id }}" article_id="{{ $loop->iteration }}" date="{{ $save->created_at->diffForHumans() }}" posts="{{ false }}" image="{{ $save->article->articale_cover }}" title="{{ $save->article->title }}"></x-top-article>
            @empty
                <p class="text-lg text-slate-500 font-medium capitalize text-center mt-10">No articles saved yet</p>
            @endforelse
        </div>
    </div>
</x-dashboard>
