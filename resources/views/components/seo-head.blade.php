@props([
    'title' => null,
    'description' => null,
    'image' => null,
    'imageAlt' => 'April UI component preview',
    'type' => 'website',
    'robots' => 'index, follow',
])

@php
    $siteName = config('app.name') === 'Laravel' ? 'April UI' : config('app.name');
    $pageTitle = $title ? $title.' | '.$siteName : $siteName;
    $pageDescription = $description ?: 'Laravel UI components for Blade and Livewire, with the workflow and elegance of Laravel.';
    $pageUrl = url()->current();
    $socialImage = $image ?: asset('images/examples/dashboard.png');
    $siteUrl = url('/');
    $schema = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'WebSite',
                '@id' => $siteUrl.'#website',
                'url' => $siteUrl,
                'name' => $siteName,
                'description' => $pageDescription,
            ],
            [
                '@type' => 'WebPage',
                '@id' => $pageUrl.'#webpage',
                'url' => $pageUrl,
                'name' => $pageTitle,
                'description' => $pageDescription,
                'isPartOf' => ['@id' => $siteUrl.'#website'],
                'inLanguage' => 'en-US',
                'primaryImageOfPage' => [
                    '@type' => 'ImageObject',
                    'url' => $socialImage,
                ],
            ],
        ],
    ];
@endphp

<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
<meta name="robots" content="{{ $robots }}">
<meta name="author" content="{{ $siteName }}">
<meta name="application-name" content="{{ $siteName }}">
<meta name="color-scheme" content="light dark">
<meta name="theme-color" content="#EBF1EA" media="(prefers-color-scheme: light)">
<meta name="theme-color" content="#0C120F" media="(prefers-color-scheme: dark)">
<link rel="canonical" href="{{ $pageUrl }}">

<meta property="og:type" content="{{ $type }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:url" content="{{ $pageUrl }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:locale" content="en_US">
<meta property="og:image" content="{{ $socialImage }}">
<meta property="og:image:secure_url" content="{{ $socialImage }}">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1118">
<meta property="og:image:height" content="636">
<meta property="og:image:alt" content="{{ $imageAlt }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:url" content="{{ $pageUrl }}">
<meta name="twitter:image" content="{{ $socialImage }}">
<meta name="twitter:image:alt" content="{{ $imageAlt }}">

<script type="application/ld+json">@json($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>
