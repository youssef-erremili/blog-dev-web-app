<x-dashboard>
    <x-breadcrumb />
    
    <!-- Header Section -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Profile Settings</h1>
                <p class="text-gray-600 mt-2">Manage your name, password and account settings</p>
            </div>
            <div>
                <a href="{{ route('author', ['id' => Auth::user()->id, 'author' => Str::slug(Auth::user()->name)]) }}" 
                   target="_blank"
                   class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-semibold rounded-xl hover:bg-gray-800 transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5 group">
                    <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    View Public Profile
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Settings Navigation -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sticky top-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Settings</h3>
                <nav class="space-y-2">
                    <a href="#profile-picture" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile Picture
                    </a>
                    <a href="#personal-info" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Personal Info
                    </a>
                    <a href="#security" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Password & Security
                    </a>
                    <a href="#social-links" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                        Social Links
                    </a>
                    <a href="#account-settings" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Account Settings
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-3 space-y-8">
            
            <!-- Profile Picture Section -->
            <div id="profile-picture" class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900">Profile Picture</h2>
                    <p class="text-sm text-gray-600 mt-1">Update your profile photo to personalize your account</p>
                </div>
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                        <!-- Current Profile Picture -->
                        <div class="flex-shrink-0">
                            @if (Auth::user()->profile_picture !== null)
                                <img class="w-24 h-24 rounded-full object-cover border-4 border-gray-200 shadow-lg" 
                                     id="imagePreview" 
                                     src="{{ asset('storage/' . Auth::user()->profile_picture) }}" 
                                     alt="Current profile picture">
                            @else
                                <div class="w-24 h-24 rounded-full bg-gradient-to-br from-gray-400 to-gray-600 flex items-center justify-center shadow-lg" id="imagePreview">
                                    <span class="text-2xl font-bold text-white">
                                        {{ Str::limit(Auth::user()->name, 1, '') }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Upload Controls -->
                        <div class="flex-1">
                            <x-form action="{{ route('handle-profile', ['id' => Auth::id()]) }}" class="space-y-4">
                                @method('PUT')
                                <div class="space-y-4">
                                    <!-- File Upload -->
                                    <div class="relative">
                                        <input type="file" 
                                               name="profile_picture" 
                                               id="profile_picture" 
                                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" 
                                               accept="image/*">
                                        <label for="profile_picture" 
                                               class="flex items-center justify-center px-4 py-3 bg-gray-100 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 group">
                                            <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                            </svg>
                                            <span class="text-sm font-medium text-gray-600 group-hover:text-gray-800">Choose new photo</span>
                                        </label>
                                    </div>

                                    @error('profile_picture')
                                        <p class="text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror

                                    <!-- Action Buttons -->
                                    <div class="flex flex-wrap gap-3">
                                        <button type="submit" 
                                                name="action" 
                                                value="{{ Auth::user()->profile_picture !== null ? 'update' : 'add' }}" 
                                                class="inline-flex items-center px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                            </svg>
                                            {{ Auth::user()->profile_picture !== null ? 'Update Photo' : 'Add Photo' }}
                                        </button>
                                        
                                        @if(Auth::user()->profile_picture !== null)
                                            <button type="submit" 
                                                    name="action" 
                                                    value="delete" 
                                                    class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 text-sm font-medium rounded-lg hover:bg-red-200 transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Remove Photo
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personal Information Section -->
            <div id="personal-info" class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900">Personal Information</h2>
                    <p class="text-sm text-gray-600 mt-1">Update your personal details and bio</p>
                </div>
                <div class="p-6">
                    <x-form action="{{ route('save-info', ['id' => Auth::id()]) }}" class="space-y-6">
                        @method('PUT')
                        
                        <!-- Full Name -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                            <label for="name" class="text-sm font-medium text-gray-900 md:pt-3">Full Name</label>
                            <div class="md:col-span-2">
                                <input type="text" 
                                       name="name" 
                                       value="{{ Auth::user()->name }}" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 placeholder:text-gray-400" 
                                       id="name" 
                                       placeholder="Enter your full name">
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                            <label for="email" class="text-sm font-medium text-gray-900 md:pt-3">Email Address</label>
                            <div class="md:col-span-2">
                                <input type="email" 
                                       name="email" 
                                       value="{{ Auth::user()->email }}" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 placeholder:text-gray-400" 
                                       id="email" 
                                       placeholder="Enter your email address">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                            <label for="location" class="text-sm font-medium text-gray-900 md:pt-3">Location</label>
                            <div class="md:col-span-2">
                                <input type="text" 
                                       name="location" 
                                       value="{{ Auth::user()->location }}" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 placeholder:text-gray-400" 
                                       id="location" 
                                       placeholder="Enter your location">
                                @error('location')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Bio -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                            <label for="bio" class="text-sm font-medium text-gray-900 md:pt-3">Author Bio</label>
                            <div class="md:col-span-2">
                                <textarea name="bio" 
                                          rows="4" 
                                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 placeholder:text-gray-400 resize-none" 
                                          id="bio" 
                                          placeholder="Tell readers about yourself...">{{ Auth::user()->bio }}</textarea>
                                @error('bio')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-200">
                            <x-button-primary class="px-6 py-3 bg-gray-900 hover:bg-gray-800 text-white font-medium rounded-xl transition-colors duration-200">
                                Save Information
                            </x-button-primary>
                        </div>
                    </x-form>
                </div>
            </div>

            <!-- Password & Security Section -->
            <div id="security" class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900">Password & Security</h2>
                    <p class="text-sm text-gray-600 mt-1">Update your password to keep your account secure</p>
                </div>
                <div class="p-6">
                    <x-form action="{{ route('update-password', ['id' => Auth::id()]) }}" class="space-y-6">
                        @method('PUT')
                        
                        <!-- Current Password -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                            <label for="current_password" class="text-sm font-medium text-gray-900 md:pt-3">Current Password</label>
                            <div class="md:col-span-2">
                                <input type="password" 
                                       name="current_password" 
                                       class="password-show w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 placeholder:text-gray-400" 
                                       id="current_password" 
                                       placeholder="Enter current password">
                                @error('current_password')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- New Password -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                            <label for="password" class="text-sm font-medium text-gray-900 md:pt-3">New Password</label>
                            <div class="md:col-span-2">
                                <input type="password" 
                                       name="password" 
                                       class="password-show w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 placeholder:text-gray-400" 
                                       id="password" 
                                       placeholder="Enter new password">
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                            <label for="password_confirmation" class="text-sm font-medium text-gray-900 md:pt-3">Confirm Password</label>
                            <div class="md:col-span-2">
                                <input type="password" 
                                       name="password_confirmation" 
                                       class="password-show w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 placeholder:text-gray-400" 
                                       id="password_confirmation" 
                                       placeholder="Confirm new password">
                                @error('password_confirmation')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <x-button-primary class="px-6 py-3 bg-gray-900 hover:bg-gray-800 text-white font-medium rounded-xl transition-colors duration-200">
                                    Change Password
                                </x-button-primary>
                                <div class="flex items-center">
                                    <input id="toggle-password" 
                                           type="checkbox" 
                                           class="w-4 h-4 text-gray-900 bg-gray-100 border-gray-300 rounded focus:ring-gray-500">
                                    <label for="toggle-password" class="ml-2 text-sm text-gray-600 cursor-pointer select-none">
                                        Show passwords
                                    </label>
                                </div>
                            </div>
                        </div>
                    </x-form>
                </div>
            </div>

            <!-- Social Links Section -->
            <div id="social-links" class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900">Social Media Links</h2>
                    <p class="text-sm text-gray-600 mt-1">Connect your social media accounts</p>
                </div>
                <div class="p-6">
                    <x-form action="{{ route('save-links', ['id' => Auth::id()]) }}" class="space-y-6">
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Website -->
                            <div>
                                <label for="website" class="block text-sm font-medium text-gray-900 mb-2">Website</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9V4a9 9 0 019 9z"></path>
                                        </svg>
                                    </div>
                                    <input type="url" 
                                           name="website" 
                                           value="{{ Auth::user()->website }}" 
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 placeholder:text-gray-400" 
                                           id="website" 
                                           placeholder="https://yourwebsite.com">
                                </div>
                                @error('website')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Social Profile -->
                            <div>
                                <label for="profile" class="block text-sm font-medium text-gray-900 mb-2">Social Profile</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <input type="url" 
                                           name="profile" 
                                           value="{{ Auth::user()->profile }}" 
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 placeholder:text-gray-400" 
                                           id="profile" 
                                           placeholder="https://linkedin.com/in/yourprofile">
                                </div>
                                @error('profile')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Facebook -->
                            <div>
                                <label for="facebook" class="block text-sm font-medium text-gray-900 mb-2">Facebook</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                                        </svg>
                                    </div>
                                    <input type="url" 
                                           name="facebook" 
                                           value="{{ Auth::user()->facebook }}" 
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 placeholder:text-gray-400" 
                                           id="facebook" 
                                           placeholder="https://facebook.com/yourprofile">
                                </div>
                                @error('facebook')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Instagram -->
                            <div>
                                <label for="instagram" class="block text-sm font-medium text-gray-900 mb-2">Instagram</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987s11.987-5.367 11.987-11.987C24.004 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.542-3.293-1.445-.845-.903-1.293-2.12-1.293-3.543s.448-2.64 1.293-3.543c.845-.903 1.996-1.445 3.293-1.445s2.448.542 3.293 1.445c.845.903 1.293 2.12 1.293 3.543s-.448 2.64-1.293 3.543c-.845.903-1.996 1.445-3.293 1.445zm7.138 0c-1.297 0-2.448-.542-3.293-1.445-.845-.903-1.293-2.12-1.293-3.543s.448-2.64 1.293-3.543c.845-.903 1.996-1.445 3.293-1.445s2.448.542 3.293 1.445c.845.903 1.293 2.12 1.293 3.543s-.448 2.64-1.293 3.543c-.845.903-1.996 1.445-3.293 1.445z"></path>
                                        </svg>
                                    </div>
                                    <input type="url" 
                                           name="instagram" 
                                           value="{{ Auth::user()->instagram }}" 
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 placeholder:text-gray-400" 
                                           id="instagram" 
                                           placeholder="https://instagram.com/yourprofile">
                                </div>
                                @error('instagram')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-4 border-t border-gray-200">
                            <x-button-primary class="px-6 py-3 bg-gray-900 hover:bg-gray-800 text-white font-medium rounded-xl transition-colors duration-200">
                                Save Social Links
                            </x-button-primary>
                        </div>
                    </x-form>
                </div>
            </div>

            <!-- Account Settings Section -->
            <div id="account-settings" class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900">Account Settings</h2>
                    <p class="text-sm text-gray-600 mt-1">Manage your account privacy and preferences</p>
                </div>
                <div class="p-6 space-y-8">
                    
                    <!-- Privacy Settings -->
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 mb-4">Privacy Settings</h3>
                        <x-form action="{{ route('change-visibility', ['id' => Auth::id()]) }}">
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                                <div>
                                    <label class="text-sm font-medium text-gray-900">Account Visibility</label>
                                    <p class="text-xs text-gray-500 mt-1">Control who can see your profile</p>
                                </div>
                                <div class="md:col-span-2">
                                    <select name="visibility" 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 bg-white">
                                        <option value="public" {{ Auth::user()->visibility == 'public' ? 'selected' : '' }}>
                                            🌍 Public - Visible to everyone
                                        </option>
                                        <option value="private" {{ Auth::user()->visibility == 'private' ? 'selected' : '' }}>
                                            🔒 Private - Hidden from public view
                                        </option>
                                    </select>
                                    <div class="mt-3 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                        <p class="text-sm text-blue-800">
                                            <span class="font-medium">Note:</span> This action will permanently hide all your data from visitors, but you can change it anytime.
                                        </p>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="px-6 py-3 bg-gray-900 hover:bg-gray-800 text-white font-medium rounded-xl transition-colors duration-200">
                                            Update Visibility
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </x-form>
                    </div>

                    <!-- Danger Zone -->
                    <div class="pt-6 border-t border-red-200">
                        <div class="bg-red-50 border border-red-200 rounded-xl p-6">
                            <h3 class="text-base font-semibold text-red-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.314 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                Danger Zone
                            </h3>
                            <x-form action="{{ route('destroy-account', ['id' => Auth::id()]) }}">
                                @method('DELETE')
                                <div x-data="{ model: false }">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                                        <div>
                                            <label class="text-sm font-medium text-red-900">Delete Account</label>
                                            <p class="text-xs text-red-700 mt-1">Permanently remove your account</p>
                                        </div>
                                        <div class="md:col-span-2">
                                            <button type="button" 
                                                    @click="model = !model" 
                                                    class="inline-flex items-center px-4 py-3 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-xl transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete My Account
                                            </button>
                                            <div class="mt-3 p-3 bg-red-100 border border-red-300 rounded-lg">
                                                <p class="text-sm text-red-800">
                                                    <span class="font-medium">Warning:</span> This action will permanently delete all your data from our system. It cannot be undone, so please proceed with caution.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <x-model></x-model>
                                </div>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for enhanced functionality -->
    <script>
        // Profile picture preview
        document.getElementById('profile_picture').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    if (preview.tagName === 'IMG') {
                        preview.src = e.target.result;
                    } else {
                        // Replace the div with an img element
                        const img = document.createElement('img');
                        img.id = 'imagePreview';
                        img.className = 'w-24 h-24 rounded-full object-cover border-4 border-gray-200 shadow-lg';
                        img.src = e.target.result;
                        img.alt = 'Profile picture preview';
                        preview.parentNode.replaceChild(img, preview);
                    }
                };
                reader.readAsDataURL(file);
            }
        });

        // Password visibility toggle
        document.getElementById('toggle-password').addEventListener('change', function() {
            const passwordFields = document.querySelectorAll('.password-show');
            const type = this.checked ? 'text' : 'password';
            passwordFields.forEach(field => {
                field.type = type;
            });
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Active navigation highlighting
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('[id]');
            const navLinks = document.querySelectorAll('nav a[href^="#"]');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('bg-gray-100', 'text-gray-900');
                link.classList.add('text-gray-700');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('bg-gray-100', 'text-gray-900');
                    link.classList.remove('text-gray-700');
                }
            });
        });
    </script>
</x-dashboard>