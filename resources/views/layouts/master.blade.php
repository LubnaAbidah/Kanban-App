<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <title>@yield('pageTitle')</title>
</head>

<body>
  <!-- Memperbarui HTML code dibawah -->
  <div class="container">
    @include('partials.sidebar')
    <div class="main">
      @yield('main')
    </div>
</body>

</html>