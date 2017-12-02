<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<title>@yield('title')</title>
    @include('layouts.head')
    @yield('style')
</head>
<body class="page-home">
<main id="app">

    @include('layouts.header')
    
    @yield('content')

    @include('layouts.cards-info')  

    @include('layouts.footer')

    <section class="widget-send-parcel bg-info headroom footer--fixed">
        <a href="/send.step.1.php"><span>Envoyer un colis</span> <i class="d-inline-block mdi mdi-cube-send mdi-24px animated tada infinite"></i></a>
    </section>
    
</main>
@include('layouts.scripts-footer')
@yield('script')
</body>
</html>