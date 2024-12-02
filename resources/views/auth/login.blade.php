<x-layout>
    <x-form action="{{ route('login') }}">
        @method('POST')
        <div class="border bg-slate-50 bg-opacity-20 w-2/4 py-10 px-12 mx-auto my-10 rounded-lg shadow-md shadow-gray-100">
            @error('failed')
                <span class="text-base bg-red-500 mx-auto text-center my-3 text-white rounded-md block w-[25rem] py-2 px-3">{{ $message }}</span>
            @enderror
            <h2 class="text-3xl text-indigo-500 my-5 font-bold">Welcome Back!</h2>      
            <div class="mb-6">
                <label class="flex items-start mb-2 text-gray-600 text-sm font-medium">
                    Email Address
                    <img class="mt-[2.5px] ml-[2px]" src="{{ asset('images/required.svg') }}" alt="image">
                </label>
                <input type="email" name="email" value="{{ old('email') }}" class="@error('email') border-red-400 border-2 @enderror block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border-2 border-gray-200 rounded-xl placeholder-gray-400 focus:outline-none" placeholder="Email address">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="flex items-start mb-2 text-gray-600 text-sm font-medium">
                    Password 
                    <img class="mt-[2.5px] ml-[2px]" src="{{ asset('images/required.svg') }}" alt="image">
                </label>
                <input type="password" name="password" class="@error('password') border-red-400 border-2 @enderror block w-full h-11 px-5 py-2.5 leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border-2 border-gray-200 rounded-xl placeholder-gray-400 focus:outline-none "
                    placeholder="Password">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="py-2 px-10 shadow-sm rounded-xl bg-indigo-600 hover:bg-green-500 transition-all duration-200 text-white text-lg font-semibold leading-7">
                Login
            </button>
        </div>
    </x-form>
</x-layout>
