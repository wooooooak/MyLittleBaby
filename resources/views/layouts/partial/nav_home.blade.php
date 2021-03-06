<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Branding Image -->
      <a class="navbar-brand" href="{{route('root')}}">
        {{-- {{ config('app.name', 'My Little Baby') }} --}}
        <div class='hover-title'>
          <span>M</span><span>Y</span><span> </span>
          <span>L</span><span>I</span><span>T</span><span>T</span><span>L</span><span>E</span><span> </span>
          <span>B</span><span>A</span><span>B</span><span>Y</span>
        </div>
      </a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <!-- Left Side Of Navbar -->
      <ul class="nav navbar-nav">
        <li>
          <a href="{{ route('articles.index') }}">
              {{ trans('forum.title') }}
          </a>
        </li>
         @foreach (config('project.locales') as $locale => $language)
           <li {!! ($locale == $currentLocale ) ? 'class="active"' : '' !!}>
             <a href="{{ route('locale', ['locale' => $locale, 'return' => urlencode($currentUrl)]) }}">
               {{ $language }}
             </a>
           </li>
         @endforeach
      </ul>



      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right ">
        <!-- Authentication Links -->
        @if (Auth::guest())
          <!-- Button trigger modal -->
          <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id='nav_btn' data-toggle="modal" data-target="#myModal">
            <i class="fa fa-user"> </i> {{trans('auth.sessions.sign_btn')}}
          </button>
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Sign up / Sign in to MLB</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <a class="btn btn-default btn-lg btn-block login-btn" href="{{ route('social.login', ['github']) }}">
                      <strong>
                        <img src="/github.png" alt="">
                         {{trans('auth.sessions.login_with_github')}}
                      </strong>
                    </a>
                  </div>
                  <div class="form-group">
                    <a class="btn btn-default btn-lg btn-block login-btn" href="{{ route('social.login', ['facebook']) }}">
                      <strong>
                        <img src="/facebook.png" alt="">
                        {{trans('auth.sessions.login_with_facebook')}}
                      </strong>
                    </a>
                  </div>
                  <div class="form-group">
                    <a class="btn btn-default btn-lg btn-block login-btn" href="{{ route('social.login', ['google']) }}">
                      <strong>
                        <img src="/google-plus.png" alt="">
                        {{trans('auth.sessions.login_with_google')}}
                      </strong>
                    </a>
                  </div>

                  <div class="text-center">
                    <a href="{{ route('sessions.create') }}">{{trans('auth.sessions.login_by_mlb')}}</a>
                  </div>
                  <div class="text-center">
                    <a href="{{ route('users.create') }}">{{trans('auth.sessions.not_auth_user')}} </a> <a href="{{ route('remind.create') }}">{{trans('auth.sessions.find_pw')}}</a>
                  </div>
                </div>
                <div class="modal-footer text-center">
                </div>
              </div>
            </div>
          </div>

        @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="{{ route('sessions.destroy') }}">
                  로그아웃
                </a>
              </li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
