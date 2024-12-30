@props(['action', 'message'])

<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
    x-transition:leave="transition-opacity duration-500 ease-out"
    x-transition:enter="transition-opacity duration-500 ease-in"
    class="py-4 px-6 w-fit fixed top-4 z-50 right-5 text-sm rounded-xl border-2 border-green-400 bg-green-50">
    <span class="mb-3 text-lg font-semibold text-[#31C48D] capitalize">{{ $action }}</span>
    <p class="text-[#31C48D] text-base font-normal text-pretty leading-relaxed">{{ $message }}</p>
</div>
