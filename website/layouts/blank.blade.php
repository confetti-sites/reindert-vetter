<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('head_title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/website__tailwind/tailwind.output.css"/>
    <link rel="stylesheet" href="/website/assets/css/fonts.css"/>
    <!-- Icons from: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
    @stack('style_*')
    @include('website.includes.dev_tools')
</head>
<body class="text-lg overflow-x-hidden">
@yield('content')
@stack('end_of_body_*')
</body>
</html>
