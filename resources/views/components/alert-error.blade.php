<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
    x-transition:leave="transition-opacity duration-500 ease-out"
    x-transition:enter="transition-opacity duration-500 ease-in"
    class="py-4 px-6 w-fit fixed top-4 z-50 right-5 text-sm border-2 border-red-600 rounded-xl bg-red-50">
    <span class="mb-3 text-lg font-semibold text-red-600 capitalize">Error</span>
    <p class="text-red-600 text-base font-normal text-pretty leading-relaxed">Something had happend suddenly, Please try again later</p>
</div>