<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
  <meta name="msapplication-tap-highlight" content="no">
    <title>{{config('app.name','My Little Baby')}}</title>

      <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <!-- Styles -->
     <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
     <link href="/css/navbar.css" rel="stylesheet">
     <link href="/css/modal/login_modal.css" rel="stylesheet">
     <link href="/css/intro-page/intro_box.css" rel="stylesheet">

  <style>
     body{
       font-size: 15px;
       background-color: white;
     }
     .intro-1{
       height:91vh;
     }
     .intro-title{
       margin-top: 20vh;
     }
     .card-info h1,.card-info h2,.card-info h3{
       font-size:15px;
     }
     .intro-2>h3{
       color:black;
       margin-top: 50px;
       margin-bottom: 100px;
     }
     .intro-2 h3 + .blog-card{
        background: url('mnb.jpg') no-repeat center;
     }
     .intro-2 h3 + .blog-card + .blog-card{
       background: url('bbb.jpg') no-repeat;
     }
     .register-box{
       background-image: linear-gradient(120deg, #fccb90 0%, #d57eeb 100%);
       margin-top: 60px;
       border-radius: 14px;
       width: 500px;
       left: 50%; transform: translateX(-10%);
       padding: 15px;
       margin-bottom: 50px;
       box-shadow: 5px 7px 70px rgba(0, 0, 0, .2);
     }
     .form-group-center{
       text-align: center;
     }
     .btn-pink{
       background-color: #ed076e;
       color: white;
     }
     .btn-social{
       background-color:  rgba( 255, 255, 255, 0.5 );
       color: black;
     }
     .full-content{
        background: url('/reg_image3.jpg') no-repeat ;
        background-size: cover;
     }
     .text-white{
       color : white;
     }

  </style>
</head>
@php
  $seg = Request::segment(1);    //localhost:8000/segment(1)/segment(2)
@endphp
  <body id="welcomeBody">
    @include('layouts.partial.nav_home')

      @if ($seg)
        @yield('content')
      @else
        @include('welcomeView.introPage')
        @include('layouts.partial.footer')
      @endif


    <!-- Scripts -->
    <script src="{{ elixir('js/app.js') }}"></script>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
