@php
    $seo = app(\App\Support\FrontendSeo::class)->resolve(trim($__env->yieldContent('seo_key')), [
        'title' => trim($__env->yieldContent('title', '')),
        'description' => trim($__env->yieldContent('description', '')),
        'og_title' => trim($__env->yieldContent('og_title', '')),
        'og_description' => trim($__env->yieldContent('og_description', '')),
        'og_image' => trim($__env->yieldContent('og_image', '')),
        'twitter_title' => trim($__env->yieldContent('twitter_title', '')),
        'twitter_description' => trim($__env->yieldContent('twitter_description', '')),
        'twitter_image' => trim($__env->yieldContent('twitter_image', '')),
    ]);
    $marketing = app(\App\Support\FrontendMarketing::class)->resolve();
@endphp
<!DOCTYPE html>
<html lang="en" data-wf-page="@yield('wf_page', '69b1dc80ba6c1f2f1c8bddfb')" data-wf-site="@yield('wf_site', '69b1dc80ba6c1f2f1c8bddff')">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $seo['title'] }}</title>
    <meta name="description" content="{{ $seo['description'] }}">
    <meta name="robots" content="{{ $seo['robots'] }}">
    <link rel="canonical" href="{{ $seo['canonical_url'] }}">
    <meta property="og:title" content="{{ $seo['og_title'] }}">
    <meta property="og:description" content="{{ $seo['og_description'] }}">
    <meta property="og:image" content="{{ $seo['og_image'] }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seo['canonical_url'] }}">
    <meta property="og:site_name" content="{{ $seo['site_name'] }}">
    <meta name="twitter:title" content="{{ $seo['twitter_title'] }}">
    <meta name="twitter:description" content="{{ $seo['twitter_description'] }}">
    <meta name="twitter:image" content="{{ $seo['twitter_image'] }}">
    <meta name="twitter:card" content="summary_large_image">
    @if (! empty($marketing['google_search_console_verification']))
        <meta name="google-site-verification" content="{{ $marketing['google_search_console_verification'] }}">
    @endif
    @if (! empty($marketing['bing_webmaster_verification']))
        <meta name="msvalidate.01" content="{{ $marketing['bing_webmaster_verification'] }}">
    @endif
    @if (! empty($marketing['meta_domain_verification']))
        <meta name="facebook-domain-verification" content="{{ $marketing['meta_domain_verification'] }}">
    @endif
    <meta content="Webflow" name="generator">

    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/webflow.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/siliconbari.webflow.css') }}" rel="stylesheet" type="text/css">

    @yield('page_styles')

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="{{ $seo['favicon_url'] ?: asset('images/favicon.svg') }}" rel="icon" media="(prefers-color-scheme: light)">
    <link href="{{ $seo['favicon_url'] ?: asset('images/favicon.svg') }}" rel="icon" media="(prefers-color-scheme: dark)">
    <link href="{{ asset('images/webclip.svg') }}" rel="apple-touch-icon">

    @if (! empty($seo['schema_json']))
        <script type="application/ld+json">{!! json_encode($seo['schema_json'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>
    @endif

    @if ($marketing['gtm_enabled'])
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','{{ $marketing['gtm_container_id'] }}');
        </script>
    @endif

    @if ($marketing['ga4_enabled'])
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $marketing['ga4_measurement_id'] }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $marketing['ga4_measurement_id'] }}');
        </script>
    @endif

    @if ($marketing['meta_pixel_enabled'])
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $marketing['meta_pixel_id'] }}');
            fbq('track', 'PageView');
        </script>
    @endif

    @if ($marketing['tiktok_pixel_enabled'])
        <script>
            !function (w, d, t) {
                w.TiktokAnalyticsObject=t;
                var ttq=w[t]=w[t]||[];
                ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"];
                ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))};};
                for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);
                ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e;};
                ttq.load=function(e,n){var r="https://analytics.tiktok.com/i18n/pixel/events.js",o=n&&n.partner;
                ttq._i=ttq._i||{};ttq._i[e]=[];ttq._i[e]._u=r;ttq._t=ttq._t||{};ttq._t[e]=+new Date;
                ttq._o=ttq._o||{};ttq._o[e]=n||{};n=document.createElement("script");
                n.type="text/javascript";n.async=!0;n.src=r+"?sdkid="+e+"&lib="+t;
                e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e);};
                ttq.load('{{ $marketing['tiktok_pixel_id'] }}');
                ttq.page();
            }(window, document, 'ttq');
        </script>
    @endif

    @if (! empty($marketing['custom_head_scripts']))
        {!! $marketing['custom_head_scripts'] !!}
    @endif

    @yield('structured_data')
</head>
<body>
    @if ($marketing['gtm_enabled'])
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id={{ $marketing['gtm_container_id'] }}"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
    @endif

    @if ($marketing['meta_pixel_enabled'])
        <noscript>
            <img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id={{ $marketing['meta_pixel_id'] }}&ev=PageView&noscript=1"
                alt="">
        </noscript>
    @endif

    @if (! empty($marketing['custom_body_start_scripts']))
        {!! $marketing['custom_body_start_scripts'] !!}
    @endif

    <div class="page-wrapper">
        @include('partials.header')

        <main class="main-wrapper">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    @yield('modals')

    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=69b1dc80ba6c1f2f1c8bddff" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous" defer></script>
    <script src="{{ asset('js/webflow.js') }}" type="text/javascript" defer></script>
    <script src="https://cdn.prod.website-files.com/gsap/3.14.2/gsap.min.js" type="text/javascript" defer></script>

    @if (! empty($marketing['custom_body_end_scripts']))
        {!! $marketing['custom_body_end_scripts'] !!}
    @endif

    @stack('scripts')
</body>
</html>
