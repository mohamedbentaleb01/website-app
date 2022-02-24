<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  
  <title>{{ config('app.name', 'Laravel') }}</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet">
  <link rel="shortcut icon" type="image/jpg" href="/img/logo.png"/>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
  <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
  @livewireStyles
</head>
<body>
  
  <div id="app">
    <main class="justify-center items-center">
      @yield('content')
    </main>
  </div>

  @livewireScripts 
</body>
</html>

@yield('scripts')


