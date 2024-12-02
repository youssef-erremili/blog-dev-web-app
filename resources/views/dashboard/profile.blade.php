<x-dashboard>
    <div class="flex items-start justify-between relative">
        <section>
            <h1 class="capitalize font-semibold text-2xl text-slate-800">Profile</h1>
            <p class="text-sm text-gray-500 my-2">Manage your name, password and account settings.</p>
        </section>
    </div>
    <div class="py-4 px-10">
        <x-form action="">
            <div class="flex items-center py-10 border-b-2">
                <div class="w-1/3">
                    <label class="text-sm text-gray-500">Profile picture</label>
                </div>
                <div class="flex justify-between">
                    <div class="flex flex-wrap items-center">
                        <div class="">
                            <span class="border-2 overflow-hidden border-indigo-600 flex shrink-0  size-20 cursor-pointer rounded-full">
                                <img class="rounded-full border-2" src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="profile">
                            </span>
                        </div>
                        <div class="mx-3">
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
                                <input type="file" class="absolute z-40 opacity-0 cursor-pointer file:cursor-pointer w-32" name="profile_picture" id="profile_picture">
                                <button type="button" class="py-2 z-50 px-3 inline-flex items-center gap-x-2 text-xs font-semibold rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-10 border-b-2">
                <h2 class="text-slate-800 font-semibold">Personal info</h2>
                <div class="flex justify-between items-center w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="name" class="text-sm text-gray-500">full name</label>
                    </section>
                    <section class="w-3/4">
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="block w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="name" placeholder="Enter full name">
                    </section>
                </div>
                <div class="flex justify-between items-center w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="name" class="text-sm text-gray-500">Email address</label>
                    </section>
                    <section class="w-3/4">
                        <input type="email" name="email_address" value="{{ Auth::user()->email }}" class="block w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="email" placeholder="Enter Email address">
                    </section>
                </div>
                <div class="flex justify-between items-center w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="name" class="text-sm text-gray-500">Country</label>
                    </section>
                    <section class="w-3/4">
                        <input type="text" name="Country" class="block w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="Country" placeholder="Enter Country">
                    </section>
                </div>
                <div class="flex justify-between items-center w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="password" class="text-sm text-gray-500">Current password</label>
                    </section>
                    <section class="w-3/4">
                        <input type="password" name="password" class="block w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="password" placeholder="Enter current password">
                    </section>
                </div>
                <div class="flex justify-between items-center w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="password" class="text-sm text-gray-500">New password</label>
                    </section>
                    <section class="w-3/4">
                        <input type="password" name="password" class="block w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="password" placeholder="Enter new password">
                    </section>
                </div>
                <div>
                    <button type="submit" class="py-1.5 px-4 capitalize mt-12 block rounded-md bg-indigo-600 transition-all duration-200 text-white text-sm font-normal leading-7">
                        save changes
                    </button>
                </div>
            </div>
            <div class="py-10 border-b-2">
                <h2 class="text-slate-800 font-semibold">Social accounts</h2>
                <div class="flex justify-between w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="password" class="text-sm text-gray-500">social profile</label>
                    </section>
                    <div class="w-3/4">
                        <section class="" id="container">
                            <input type="password" name="password" class="block w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="social" placeholder="Link to social profile">
                            <input type="password" name="password" class="block my-2 w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="social" placeholder="Link to social profile">
                        </section>
                        <section class="">
                            <button type="button" id="addLinkButton" class="flex justify-between items-center my-3 border p-1.5 px-3 rounded-md text-sm text-slate-500">
                                <img class="size-5" src="{{ asset('images/add.svg') }}" alt="icon add">
                                Add link
                            </button>
                        </section>
                    </div>
                </div>
            </div>
        </x-form>   
        <x-form action="">
            <div class="py-10">
                <h2 class="text-slate-800 font-semibold">Account action</h2>
                <div class="flex justify-between w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="password" class="text-sm text-gray-500">Danger zone</label>
                    </section>
                    <section class="w-3/4">
                        <button type="button" class="text-[#ef4444] border p-2.5 px-5 rounded-md text-sm font-medium">
                            Delete my account
                        </button>
                        <p class="text-sm text-gray-500 my-3 lowercase">This will immediately delete all of your data. This action is not reversible, so please continue with caution</p>
                    </section>
                </div>
            </div>
        </x-form>
    </div>
</x-dashboard>
