@php
$groups = [];

foreach ($links as $link) {
if (($link['type'] ?? null) === 'header') {
$groups[] = ['label' => $link['text'], 'links' => []];

continue;
}

if (! isset($link['href'])) {
continue;
}

if ($groups === []) {
$groups[] = ['label' => null, 'links' => []];
}

$groups[array_key_last($groups)]['links'][] = $link;
}
@endphp

@foreach ($groups as $group)
<april:sidebar-group>
    @if ($group['label'])
    <april:sidebar-group-label>{{$group['label']}}</april:sidebar-group-label>
    @endif
    <april:sidebar-group-content>
        <april:sidebar-menu>
            @foreach ($group['links'] as $link)
            <april:sidebar-menu-item>
                <april:sidebar-menu-button-link class="no-underline" href="{{url($link['href'])}}" wire:navigate
                    wire:current.exact="bg-sidebar-accent font-medium text-sidebar-accent-foreground"
                    :active="rtrim(request()->url(), '/') === rtrim(url($link['href']), '/')">
                    <span class="capitalize">{{$link['text']}}</span>
                </april:sidebar-menu-button-link>
            </april:sidebar-menu-item>
            @endforeach
        </april:sidebar-menu>
    </april:sidebar-group-content>
</april:sidebar-group>
@endforeach
