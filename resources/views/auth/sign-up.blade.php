<x-layout>
    <x-form action="{{ route('sign-up') }}">
        @method('POST')
        <div class="border bg-slate-50 bg-opacity-20 w-2/4 py-10 px-12 mx-auto my-10 rounded-lg shadow-md shadow-gray-100">
            <h2 class="text-3xl text-indigo-500 my-5 font-bold">Sign up to begin new joureny</h2>
            <div class="mb-6">
                <label class="flex items-start mb-2 text-gray-600 text-sm font-medium">
                    Full Name
                    <img class="mt-[2.5px] ml-[2px]" src="{{ asset('images/required.svg') }}" alt="image">
                </label>
                <input type="text" name="name" value="{{ old('name') }}" class="@error('name') border-red-400 border-2 @enderror block w-full h-11 px-5 py-6 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border-[1.999px] border-gray-300 rounded-md placeholder-gray-400 focus:outline-none " placeholder="Full Name">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="flex items-start mb-2 text-gray-600 text-sm font-medium">
                    Email
                    <img class="mt-[2.5px] ml-[2px]" src="{{ asset('images/required.svg') }}" alt="image">
                </label>
                <input type="email" name="email" value="{{ old('email') }}" class="@error('email') border-red-400 border-2 @enderror block w-full h-11 px-5 py-6 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border-[1.999px] border-gray-300 rounded-md placeholder-gray-400 focus:outline-none" placeholder="Email address">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="mb-2 text-gray-600 text-sm font-medium">
                    Profile Picture
                </label>
                <div>
                    <span class="sr-only cursor-pointer">Choose profile photo</span>
                    <input type="file" name="profile_picture" class="block w-full text-sm text-gray-500 border-2 cursor-pointer border-gray-200 rounded-md
                        file:me-4 file:py-3 file:px-4
                        file:rounded-s-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-600 file:text-white
                        hover:file:bg-blue-700
                        file:disabled:opacity-50 file:disabled:pointer-events-none">
                </div>
                @error('profile_picture')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="flex items-start mb-2 text-gray-600 text-sm font-medium">
                    Password
                    <img class="mt-[2.5px] ml-[2px]" src="{{ asset('images/required.svg') }}" alt="image">
                </label>
                <input type="password" name="password" class="@error('password') border-red-400 border-2 @enderror block w-full h-11 px-5 py-6 leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border-[1.999px] border-gray-300 rounded-md placeholder-gray-400 focus:outline-none "
                    placeholder="Password">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="flex items-start mb-2 text-gray-600 text-sm font-medium">
                    Repeat Password
                    <img class="mt-[2.5px] ml-[2px]" src="{{ asset('images/required.svg') }}" alt="image">
                </label>
                <input type="password" name="password_confirmation" class="@error('password') border-red-400 border-2 @enderror block w-full h-11 px-5 py-6 leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border-[1.999px] border-gray-300 rounded-md placeholder-gray-400 focus:outline-none "
                    placeholder="Password Confirmation">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="py-2 px-8 mt-5 shadow-sm rounded-md bg-indigo-600 hover:bg-indigo-500 transition-all duration-200 text-white text-lg font-medium leading-7">
                Sign Up
            </button>
        </div>
    </x-form>
</x-layout>
