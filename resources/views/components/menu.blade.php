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

@if (request()->is('docs/*') && count($docsVersions ?? []) > 1)
<div class="mb-4 px-2">
    <label for="docs-version" class="mb-2 block text-xs font-medium text-muted-foreground">Documentation version</label>
    <april:select id="docs-version" aria-label="Documentation version"
        x-on:value-change="Alpine.navigate($event.detail.value)">
        @foreach ($docsVersions as $version)
        <option value="{{url('/docs/'.$version['key'])}}" @selected($version['key'] === $currentDocsVersion)>
            {{$version['label']}}
        </option>
        @endforeach
    </april:select>
</div>
@endif

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
