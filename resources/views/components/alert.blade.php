<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)"
    x-transition:leave="transition-opacity duration-500 ease-out"
    x-transition:enter="transition-opacity duration-500 ease-in"
    class="py-4 px-6 w-fit fixed top-4 z-50 right-5 text-sm text-white rounded-xl bg-[#222b38]" role="alert">
    <span class="mb-3 text-lg font-semibold text-[#31C48D]">Success</span>
    <p class="text-[#31C48D] text-base leading-relaxed">Your subscription payment is successful</p>
</div>



{{-- seccess #31C48D --}}
{{-- error #EF4440 --}}
