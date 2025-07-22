<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left Side - Marketing Content -->
                <div class="hidden lg:block space-y-8">
                    <div class="space-y-6">
                        <h1 class="text-4xl xl:text-5xl font-bold text-gray-900 leading-tight">
                            Welcome Back to Your 
                            <span class="text-gray-700">Knowledge Hub</span>
                        </h1>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Continue your journey of discovery and sharing. Your community of passionate writers, 
                            thought leaders, and curious minds is waiting for you.
                        </p>
                    </div>

                    <!-- Recent Activity Preview -->
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                        <h3 class="font-semibold text-gray-900 mb-4">What's Happening Today</h3>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <p class="text-sm text-gray-600">127 new stories published</p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <p class="text-sm text-gray-600">89 writers joined the conversation</p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                <p class="text-sm text-gray-600">1.2K interactions across the platform</p>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial -->
                    <div class="space-y-4">
                        <blockquote class="text-lg italic text-gray-700">
                            "This platform has transformed how I share knowledge and connect with like-minded individuals. 
                            It's more than just a blog—it's a thriving ecosystem of ideas."
                        </blockquote>
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                            <div>
                                <p class="font-semibold text-gray-900">Sarah Chen</p>
                                <p class="text-sm text-gray-600">Technology Writer</p>
                            </div>
                        </div>
                    </div>

                    <!-- Platform Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8 border-t border-gray-200">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">98%</div>
                            <div class="text-xs text-gray-500">User Satisfaction</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">24/7</div>
                            <div class="text-xs text-gray-500">Active Community</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">Global</div>
                            <div class="text-xs text-gray-500">Reach</div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->
                <div class="w-full max-w-md mx-auto lg:mx-0">
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 sm:p-12">
                        <!-- Mobile Header -->
                        <div class="lg:hidden text-center mb-8">
                            <h1 class="text-2xl font-bold text-gray-900 mb-2">Welcome Back</h1>
                            <p class="text-gray-600">Continue your knowledge journey</p>
                        </div>

                        <div class="space-y-6">
                            <div class="text-center lg:text-left">
                                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">
                                    Sign In
                                </h2>
                                <p class="text-gray-600">
                                    Step back into your world of stories and insights
                                </p>
                            </div>

                            <!-- Error Message -->
                            @error('failed')
                                <div class="bg-red-50 border border-red-200 rounded-xl p-4">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-red-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        <p class="text-sm font-medium text-red-800">{{ $message }}</p>
                                    </div>
                                </div>
                            @enderror

                            <x-form action="{{ route('login') }}">
                                @method('POST')
                                
                                <!-- Email -->
                                <div class="mb-8">
                                    <label class="flex items-center text-sm font-semibold text-gray-900 mb-3">
                                        Email Address
                                        <img class="ml-1 w-2 h-2" src="{{ asset('images/required.svg') }}" alt="Required">
                                    </label>
                                    <input type="email" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           class="@error('email') border-red-400 ring-red-400 @enderror w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200" 
                                           placeholder="Enter your email address"
                                           autofocus>
                                    @error('email')
                                        <p class="text-sm text-red-600 flex items-center mt-2">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-8">
                                    <label class="flex items-center text-sm font-semibold text-gray-900 mb-3">
                                        Password
                                        <img class="ml-1 w-2 h-2" src="{{ asset('images/required.svg') }}" alt="Required">
                                    </label>
                                    <div class="relative">
                                        <input type="password" 
                                               name="password" 
                                               id="password"
                                               class="@error('password') border-red-400 ring-red-400 @enderror w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200" 
                                               placeholder="Enter your password">
                                        <button type="button" 
                                                onclick="togglePassword()"
                                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                            <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('password')
                                        <p class="text-sm text-red-600 flex items-center mt-2">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Remember Me & Forgot Password -->
                                <div class="flex items-center justify-between mb-8">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="remember" class="w-4 h-4 text-gray-900 bg-gray-100 border-gray-300 rounded focus:ring-gray-900 focus:ring-2">
                                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                    </label>
                                    <a href="#" class="text-sm font-medium text-gray-900 hover:text-gray-700 transition-colors duration-200">
                                        Forgot password?
                                    </a>
                                </div>

                                <!-- Submit Button -->
                                <x-button-primary class="w-full py-3 px-6 text-base font-semibold rounded-xl hover:shadow-lg transform hover:-translate-y-0.5">
                                    Welcome Back
                                </x-button-primary>

                                <!-- Sign Up Link -->
                                <div class="text-center pt-6 mt-8 border-t border-gray-200">
                                    <p class="text-sm text-gray-600">
                                        New to our platform? 
                                        <a href="{{ route('sign-up') }}" class="font-semibold text-gray-900 hover:text-gray-700 transition-colors duration-200">
                                            Create an account
                                        </a>
                                    </p>
                                </div>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Password Toggle Script -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }

        // Auto-focus email field on page load
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.querySelector('input[name="email"]');
            if (emailInput && !emailInput.value) {
                emailInput.focus();
            }
        });
    </script>
</x-app-layout>