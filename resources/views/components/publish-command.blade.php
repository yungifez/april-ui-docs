@props(['views' => [], 'view'])
@isset($view)
@php($views = [$view])
@endisset
## Publishing Views

Use the following command{{ count($views) > 1 ? 's' : '' }} to publish {{ count($views) > 1 ? 'these views' : 'this
view' }}:

@foreach ($views as $view)
<x-code-block-wrapper language="shell">
    php artisan vendor:publish --tag=april-view-{{ $view }}
</x-code-block-wrapper>
@endforeach
