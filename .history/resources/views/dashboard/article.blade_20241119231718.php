<x-dashboard>
    <div class="flex items-start justify-between relative">
        <section>
            <h1 class="capitalize font-semibold text-2xl text-slate-800">article insights</h1>
            <p class="text-sm text-gray-600 my-2 lowercase">Everything you want know about you article and your result in weeks is showen here </p>
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
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">article id</th>
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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $post->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ Str::limit($post->title, 25, '') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ Str::limit($post->content, 30, '...') }}</td>
                                    <td class="text-white px-6 py-4 whitespace-nowrap text-sm font-normal">
                                        <span class="{{ $post->status == 'draft' }} bg-red-500 bg-indigo-600 rounded-full py-[1.4px] px-[12px]">{{ $post->status }}</span>
                                    </td>
                                    <td class="px-6 py-4"><img class="w-8 h-8 rounded-full" src="{{ asset('storage/'. $post->articale_cover ) }}" alt="{{ $post->title }}"></td>
                                    <td class="py-4 whitespace-nowrap text-center text-sm font-medium relative">
                                        <button type="button" @click="open = ! open" class="w-7">
                                            <img src="{{ asset('images/dots.svg') }}" alt="dots svg">
                                        </button>
                                        <div x-show="open" @click.outside="open = false" x-transition class="bg-white border shadow-md rounded-md absolute z-50 top-6 -left-16">
                                            <ul>
                                                <li class="py-3 px-6 my-0.5">
                                                    <a class="flex items-center capitalize font-medium text-sm text-slate-500" href="#" target="_blank">
                                                        <ion-icon class="text-lg mr-3" name="reader-outline"></ion-icon>
                                                        read
                                                    </a>
                                                </li>
                                                <li class="py-3 px-6 my-0.5">
                                                    <a class="flex justify-center items-center capitalize font-medium text-sm text-slate-500" href="#" target="_blank" >
                                                        <ion-icon class="text-lg mr-3" name="refresh-outline"></ion-icon>
                                                        update
                                                    </a>
                                                </li>
                                                <li class="py-3 px-6 my-0.5">
                                                    <button type="button" @click="model = ! model" class="flex justify-center items-center capitalize font-medium text-sm text-red-600">
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
        <x-model></x-model>
    </div>
</x-dashboard>
