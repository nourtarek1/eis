@props(['title' => null, 'description' => null]) {{-- بيانات SEO لكل صفحة --}}
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title . ' | ' : '' }}{{ config('app.name') }}</title>
    @if ($description)
        <meta name="description" content="{{ $description }}">
    @endif
    <script>
        document.documentElement.classList.add('js')
    </script> {{-- يفعّل ستايل الظهور التدريجي --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans text-brand-charcoal antialiased"> {{-- خلفية بيضاء كما في المستند --}}
    <a href="#main"
        class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:bg-white focus:px-4 focus:py-2">Skip
        to content</a> {{-- للكيبورد --}}
    <x-site.header />
    <main id="main">{{ $slot }}</main>
    <x-site.footer />
</body>

</html>
