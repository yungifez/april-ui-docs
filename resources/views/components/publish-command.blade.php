@props(['views' => [], 'view' => null])
@isset($view)
@php($views = [$view])
@endisset
<h2 class="scroll-m-20 border-b pb-2 text-3xl font-semibold tracking-tight">Publishing Views</h2>

<p class="mt-4">Use the following command{{ count($views) > 1 ? 's' : '' }} to publish {{ count($views) > 1 ? 'these views' : 'this view' }}:</p>

@foreach ($views as $view)
<x-code-block-wrapper language="shell">
    php artisan april:publish {{ $view }}
</x-code-block-wrapper>
@endforeach

April UI keeps package views in `vendor/` by default. The command uses Laravel's vendor publishing system and copies
overrides to `resources/views/vendor/april/components`.

To publish all components, run:

<x-code-block-wrapper language="shell">
    php artisan april:publish --all
</x-code-block-wrapper>

Review local overrides after an upgrade with `php artisan april:update --diff`.
