@props(['action', 'method' => 'post'])

<form action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data">
    @csrf
    {{ $slot }}
</form>
