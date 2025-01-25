@props(['post'])

<a {{ $attributes }} href="{{ url('reader', ['id' => $post->id, 'writer' => Str::slug($post->user->name), 'title' => Str::slug($post->title)]) }}" target="_blank">
    {{ $slot }}
</a>