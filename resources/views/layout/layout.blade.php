<!DOCTYPE html>
<html lang="ru" class="page">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="theme-color" content="#111111">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  @stack('link')
  @stack('styles')
</head>

<body class="body">
<div class="body__wrapper">
  @include('components.header')
  <main class="main">
    <div class="container">
      @yield('content')
    </div>
  </main>
  @include('components.footer')
</div>
</body>
@stack('scripts')
</html>
