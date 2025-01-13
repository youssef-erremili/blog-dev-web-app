<button type="submit" {{ $attributes->merge(['class' => 'py-1.5 px-5 <z-50></z-50> capitalize inline-block leading-relaxed bg-gray-800 transition-all duration-200 text-white text-sm font-normal']) }}>
    {{ $slot }}
</button>