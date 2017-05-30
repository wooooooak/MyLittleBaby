<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-tap-highlight" content="no">

  <!-- SEO -->
  <meta name="description" content="{{ config('project.description') }}">

  <!-- Facebook Meta -->
  <meta property="og:title" content="{{ config('app.name') }}">
  <meta property="og:image" content="">
  <meta property="og:type" content="Website">
  <meta property="og:author" content="">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
  <link rel="stylesheet" href="/css/materialize.css">
  <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="/css/navbar.css">

  <style>
  @import url(http://fonts.googleapis.com/earlyaccess/notosanskr.css);
  @import url(http://fonts.googleapis.com/earlyaccess/nanumpenscript.css);
  .navbar-right{
    margin-top:0.5vh;
  }
  #app-layout{
    background: white;
  }



  @yield('style')

  </style>
  <!-- Scripts -->
  <script>
    window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
      'currentUser' => $currentUser,
      'currentRouteName' => $currentRouteName,
      'currentLocale' => $currentLocale,
      'currentUrl' => $currentUrl,
    ]); ?>
  </script>
</head>


<body id="app-layout">
  {{-- welcome view 에서는 css를 따로 적용시켜서 nav부분이 다르게 적용됨.
  다른 모든 view에서의 nav를 바꾸고 싶으면 여기서 적용하자. --}}
  @include('layouts.partial.nav_home')
    @include('flash::message')
    <div class="container-fluid">
      @yield('content')
    </div>

  @include('layouts.partial.footer')


  <!-- Scripts -->
  <script src="{{ elixir('js/app.js') }}"></script>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>

  @yield('script')
</body>
</html>
