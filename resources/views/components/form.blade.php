@props(['action'])

<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    {{ $slot }}
</form>
