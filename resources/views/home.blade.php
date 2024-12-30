<x-layout>
    @if (session('success'))
    @endif
    <x-alert-success action="success" message="Your social media saved successfully"/>
    {{-- <x-alert-error /> --}}
    {{-- <x-alert-info /> --}}
</x-layout>