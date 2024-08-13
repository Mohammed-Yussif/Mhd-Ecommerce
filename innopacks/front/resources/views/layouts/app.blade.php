<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="{{ front_route('home.index') }}">
  <title>@yield('title', system_setting_locale('meta_title', 'Ecommerce'))</title>
  <meta name="keywords" content="@yield('keywords', system_setting_locale('meta_keywords', 'Ecommerce'))">
  <meta name="description" content="@yield('description', system_setting_locale('meta_description', 'Ecommerce'))">
  <meta name="generator" content="InnoShop {{ innoshop_version() }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ image_origin(system_setting('favicon', 'images/favicon.png')) }}">
  <link rel="stylesheet" href="{{ mix('themes/default/css/bootstrap.css') }}">
  <script src="{{ mix('themes/default/js/app.js') }}"></script>
  <script src="{{ asset('vendor/layer/3.5.1/layer.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <link rel="stylesheet" href="{{ mix('themes/default/css/app.css') }}">
  <script>
    let urls = {
      cart_add: '{{ front_route('carts.store') }}',
      cart_mini: '{{ front_route('carts.mini') }}',
      login: '{{ front_route('login.index') }}',
      favorites: '{{ account_route('favorites.index') }}',
    }

    let config = {
      isLogin: !!{{ current_customer()->id ?? 'null' }},
    }
  </script>
  @stack('header')
</head>

<body class="@yield('body-class')">
  @if (!request('iframe'))
    @include('layouts.header')
  @endif

  <div class="m-0 p-0" id="appContent">
      @yield('content')
  </div>

  @if (!request('iframe'))
    @include('layouts.footer')
  @endif

  @stack('footer')
</body>

</html>
