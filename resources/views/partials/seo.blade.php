@php
    $siteName = \App\Helpers\SettingsHelper::siteTitle();
    $siteDescription = trim($__env->yieldContent('description')) ?: \App\Helpers\SettingsHelper::siteDescription();
    $pageTitle = trim($__env->yieldContent('title')) ?: $siteName;
    $pageTitle = is_string($pageTitle) ? $pageTitle : $siteName;
    $canonical = trim($__env->yieldContent('canonical')) ?: url()->current();
    // Force HTTPS if app url is https
    if (str_starts_with(config('app.url'), 'https://')) {
        $canonical = preg_replace('/^http:\\/\\//', 'https://', $canonical);
    }
    $ogImage = \App\Helpers\SettingsHelper::siteLogo();
    $locale = app()->getLocale() ?: 'bn_BD';
@endphp

<link rel="canonical" href="{{ $canonical }}" />

<!-- Open Graph -->
<meta property="og:type" content="website" />
<meta property="og:site_name" content="{{ $siteName }}" />
<meta property="og:title" content="{{ $pageTitle }}" />
<meta property="og:description" content="{{ $siteDescription }}" />
<meta property="og:url" content="{{ $canonical }}" />
@if($ogImage)
<meta property="og:image" content="{{ $ogImage }}" />
@endif
<meta property="og:locale" content="{{ $locale }}" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $pageTitle }}" />
<meta name="twitter:description" content="{{ $siteDescription }}" />
@if($ogImage)
<meta name="twitter:image" content="{{ $ogImage }}" />
@endif

<!-- JSON-LD: WebSite & Organization -->
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => $siteName,
    'url' => config('app.url'),
    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => route('fonts.index', ['q' => '{search_term_string}']),
        'query-input' => 'required name=search_term_string',
    ],
], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => $siteName,
    'url' => config('app.url'),
    'logo' => $ogImage ?: null,
], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
</script>

@stack('seo_meta')
@stack('seo_jsonld')


