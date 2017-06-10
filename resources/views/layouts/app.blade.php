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
  .action__article {
    margin-top: 1em;
  }
  .sort__article{
    margin-top: 1.5em;
  }
  .mdl-textfield__label{
    margin-bottom: : 0px;
  }
  .mdl-textfield, .mdl-textfield__input{
    margin-bottom: 0px;
  }
  .card{
    box-shadow: 5px 7px 70px rgba(0, 0, 0, .2);
  }
  .create_article{
    padding-left: 70px;
    padding-right: 70px;
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
  @include('layouts.partial.nav_home')
    @include('flash::message')
    <div class="container-fluid">
      @yield('content')
    </div>

  @include('layouts.partial.footer')


  <!-- Scripts -->
  <script src="{{ elixir('js/app.js') }}"></script>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script src="/js/materialize.js"></script>

  @yield('script')
</body>
</html>
