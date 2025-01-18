<x-dashboard>
    @if (session('editProfile'))
        <x-alert-success action="success" message="{{ session('editProfile') }}"/>
    @elseif (session('editProfileError'))
        <x-alert-error action="error" message="{{ session('editProfileError') }}"/>
    @endif
    <div class="flex items-center justify-between relative">
        <div>
            <h1 class="capitalize font-semibold text-2xl text-slate-800">Profile</h1>
            <p class="text-sm text-gray-500 my-2">Manage your name, password and account settings.</p>
        </div>
        <div class="my-8 inline-block">
            <a href="{{ route('show-profile-public', ['id' => Auth::id(), 'author' =>  str_replace(' ', '-', Auth::user()->name)]) }}" class="rounded-md bg-gray-800 text-white py-2 inline-block text-sm px-4" target="_blank">View public profile</a>
        </div>
    </div>
    <div class="py-4 px-10">
        <div class="flex py-10 border-b-2">
            <div class="w-1/3">
                <label class="text-sm text-gray-500">Profile picture</label>
            </div>
            <div class="flex justify-between">
                <div class="flex flex-wrap items-center">
                    <div>
                        @if (Auth::user()->profile_picture !== null)
                            <span class="overflow-hidden">
                                <img class="border-2 border-indigo-600 size-20 rounded-full" id="imagePreview" src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="profile">
                            </span>
                        @else
                            <span class="overflow-hidden">
                                <h2 class="capitalize size-20 pt-5 text-center rounded-full bg-indigo-500 text-3xl font-medium text-white border-2 border-white">
                                    {{ Str::limit(Auth::user()->name, 1, '') }}
                                </h2>
                                <img class="rounded-full size-20 border-2 border-indigo-600" id="imagePreview">
                            </span>
                        @endif
                    </div>
                    <div class="mx-3">
                        <x-form action="{{ route('handle-profile', ['id' => Auth::id()]) }}">
                            @method('PUT')
                            <div class="flex items-center gap-x-2 relative overflow-hidden">
                                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg cursor-pointer border border-transparent bg-blue-600 text-white">
                                    <img class="size-4" src="{{ asset('images/upload.svg') }}" alt="upload">
                                    Upload photo
                                </button>
                                <input type="file" class="absolute z-40 opacity-0 cursor-pointer file:cursor-pointer w-32" name="profile_picture" id="profile_picture">
                                <button type="submit" name="action" value="add" class="{{ Auth::user()->profile_picture !== null ? 'hidden': '' }} py-2 px-3 inline-flex items-center gap-x-2 text-xs font-semibold rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm">Add profile</button>
                                <button type="submit" name="action" value="update" class="{{ Auth::user()->profile_picture !== null ? '': 'hidden' }} py-2 px-3 inline-flex items-center gap-x-2 text-xs font-semibold rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm">Update</button>
                                <button type="submit" name="action" value="delete" class="{{ Auth::user()->profile_picture == null ? 'hidden': '' }} py-2 px-3 inline-flex items-center gap-x-2 text-xs font-semibold rounded-lg border border-gray-200 bg-white text-gray-500 shadow-sm">Delete</button>
                            </div>
                        </x-form>
                        <div>
                            @error('profile_picture')
                                <span class="text-red-500 mt-2 lowercase block text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-form action="{{ route('save-info', ['id' => Auth::id()]) }}">
            @method('PUT')
            <div class="py-10 border-b-2">
                <h2 class="text-slate-800 font-semibold">Personal info</h2>
                <div class="flex justify-between items-center w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="name" class="text-sm text-gray-500">full name</label>
                    </section>
                    <section class="w-3/4">
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="block w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="name" placeholder="Enter full name">
                        @error('name')
                            <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                        @enderror
                    </section>
                </div>
                <div class="flex justify-between items-center w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="email" class="text-sm text-gray-500">Email address</label>
                    </section>
                    <section class="w-3/4">
                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="block w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="email" placeholder="Enter Email address">
                        @error('email')
                            <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                        @enderror
                    </section>
                </div>
                <div class="flex justify-between items-center w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="location" class="text-sm text-gray-500">Location</label>
                    </section>
                    <section class="w-3/4">
                        <input type="text" name="location" value="{{ Auth::user()->location }}" class="block w-full capitalize h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="location" placeholder="Enter Location">
                        @error('location')
                            <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                        @enderror
                    </section>
                </div>
                <div class="flex justify-between  w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="bio" class="text-sm text-gray-500">author Bio</label>
                    </section>
                    <section class="w-3/4">
                        <textarea name="bio" cols="30" rows="5" class="resize-none block w-full px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="bio" placeholder="Enter Author Bio">{{ Auth::user()->bio }}</textarea>
                        @error('bio')
                            <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                        @enderror
                    </section>
                </div>
                <div class="mt-12">
                    <x-button-primary class="rounded-md">save info</x-button-primary>
                </div>
            </div>
        </x-form>
        <x-form action="{{ route('update-password', ['id' => Auth::id()]) }}">
            @method('PUT')
            <div class="py-10 border-b-2">
                <h2 class="text-slate-800 font-semibold">change password</h2>
                <div class="flex justify-between items-center w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="current_password" class="text-sm text-gray-500">Current password</label>
                    </section>
                    <section class="w-3/4">
                        <input type="password" name="current_password" class="password-show block w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="current_password" placeholder="Enter current password">
                        @error('current_password')
                            <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                        @enderror
                    </section>
                </div>
                <div class="flex justify-between items-center w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="new-password" class="text-sm text-gray-500">New password</label>
                    </section>
                    <section class="w-3/4">
                        <input type="password" name="password" class="password-show block w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="password" placeholder="Enter new password">
                        @error('password')
                            <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                        @enderror
                    </section>
                </div>
                <div class="flex justify-between items-center w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="password_confirmation" class="text-sm text-gray-500">confirm password</label>
                    </section>
                    <section class="w-3/4">
                        <input type="password" name="password_confirmation" class="password-show block w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="password_confirmation" placeholder="Confirm passowrd">
                        @error('password_confirmation')
                            <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                        @enderror
                    </section>
                </div>
                <div class="flex items-center mt-12">
                    <x-button-primary class="rounded-md">change password</x-button-primary>
                    <div class="flex items-center ml-5">
                        <input id="toggle-password" type="checkbox" class="size-5">
                        <label for="toggle-password" class="text-sm text-gray-500 cursor-pointer ms-3 select-none">Show password</label>
                    </div>
                </div>
            </div>
        </x-form>
        <x-form action="{{ route('save-links', ['id'=>Auth::id()]) }}">
            @method('PUT')
            <div class="py-10 border-b-2">
                <h2 class="text-slate-800 font-semibold">Social Media accounts</h2>
                <div class="flex justify-between w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="password" class="text-sm text-gray-500">social profile</label>
                    </section>
                    <div class="w-3/4">
                        <div>
                            <section>
                                <input type="url" name="profile" value="{{ Auth::user()->profile }}" class="block text-[15px] w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="profile" placeholder="Link to social profile">
                                @error('profile')
                                    <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                                @enderror
                            </section>
                            <section>
                                <input type="url" name="facebook" value="{{ Auth::user()->facebook }}" class="block text-[15px] mt-3 w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="facebook" placeholder="Link to social profile">
                                @error('facebook')
                                    <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                                @enderror
                            </section>
                            <section>
                                <input type="url" name="instagram" value="{{ Auth::user()->instagram }}" class="block text-[15px] mt-3 w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="instagram" placeholder="Link to social profile">
                                @error('instagram')
                                    <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                                @enderror
                            </section>
                            <section>
                                <input type="url" name="website" value="{{ Auth::user()->website }}" class="block text-[15px] mt-3 w-full h-11 px-5 py-2.5 shadow-xs text-gray-900 bg-transparent border-[1.3px] border-slate-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:border-white ring-blue-600 placeholder:text-sm" id="website" placeholder="Link to social profile">
                                @error('website')
                                    <span class="text-red-500 text-sm lowercase">{{ $message }}</span>
                                @enderror
                            </section>
                        </div>
                    </div>
                </div>
                <div class="mt-12">
                    <x-button-primary class="rounded-md">save links</x-button-primary>
                </div>
            </div>
        </x-form>
        <div class="py-10">
            <h2 class="text-slate-800 font-semibold">Account Settings</h2>
            <x-form action="{{ route('change-visibility', ['id'=>Auth::id()]) }}">
                @method('PUT')
                <div class="flex justify-between w-2/3 mt-10">
                    <section class="w-2/4">
                        <label for="password" class="text-sm text-gray-500">account privacy</label>
                    </section>
                    <section class="w-3/4">
                        <select name="visibility" id="status" class="py-3 capitalize px-4 cursor-pointer block w-full border border-gray-200 rounded-lg text-sm outline-none focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                            <option value="public" {{ Auth::user()->visibility == 'public' ? 'selected' : '' }}>public</option>
                            <option value="private" {{ Auth::user()->visibility == 'private' ? 'selected' : '' }}>private</option>
                        </select>
                        <p class="text-sm text-gray-500 my-3 lowercase">This action will permanently hide all your data from our visitors. but you change it anytime.</p>
                        <x-button-primary class="rounded-md">change visibility</x-button-primary>
                    </section>
                </div>
            </x-form>
            <x-form action="{{ route('destroy-account', ['id'=>Auth::id()]) }}">
                @method('DELETE')
                <div x-data="{ open: true, model: false }" x-transition class="flex justify-between w-2/3 mt-16">
                    <section class="w-2/4">
                        <label for="password" class="text-sm text-gray-500">Danger zone</label>
                    </section>
                    <section class="w-3/4">
                        <button type="button" @click="model = ! model" class="text-[#ef4444] border p-2.5 px-5 rounded-md text-sm font-medium">
                            Delete my account
                        </button>
                        <p class="text-sm text-gray-500 my-3 lowercase">This action will permanently delete all your data from our system. It cannot be undone, so please proceed with caution.</p>
                    </section>
                    <x-model></x-model>
                </div>
            </x-form>
        </div>
    </div>
</x-dashboard>
