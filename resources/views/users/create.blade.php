@extends('welcome')

@section('content')
  <div class="full-content">

  <form action="{{ route('users.store') }}" method="POST" role="form" class="form__auth">
    {!! csrf_field() !!}

    <div class="register-box">
    @if ($return = request('return'))
      <input type="hidden" name="return" value="{{ $return }}">
    @endif

    <div class="page-header text-center">
      <h4>
        {{ trans('auth.users.title') }}
      </h4>
      <p class="text-muted">
        {{ trans('auth.users.description') }}
      </p>
    </div>

    <div class="form-group">
      <a class="btn btn-social btn-lg btn-block" href="{{ route('social.login', ['github']) }}">
        <strong>
          <img src="/github.png" alt="">
          {{ trans('auth.sessions.login_with_github') }}
        </strong>
      </a>
    </div>
    <div class="form-group">
      <a class="btn btn-social btn-lg btn-block" href="{{ route('social.login', ['facebook']) }}">
        <strong>
          <img src="/facebook.png" alt="">
          {{ trans('auth.sessions.login_with_facebook') }}
        </strong>
      </a>
    </div>
    <div class="form-group">
      <a class="btn btn-social btn-lg btn-block" href="{{ route('social.login', ['google']) }}">
        <strong>
          <img src="/google-plus.png" alt="">
          {{ trans('auth.sessions.login_with_google') }}
        </strong>
      </a>
    </div>

    <div class="login-or text-center">
      or
    </div>

    <div class="form-group-center">

      <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? 'has-error' : '' }}">
        <input type="text" id="name_register" name="name" class="mdl-textfield__input" value="{{ old('email') }}" />
        <label class="mdl-textfield__label" for="name_register">{{ trans('auth.form.name') }}</label>
        {!! $errors->first('name', '<span class="form-error">:message</span>') !!}
      </div>

      <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'has-error' : '' }}">
        <input type="email" id="email_register" name="email" class="mdl-textfield__input" value="{{ old('email') }}" />
        <label class="mdl-textfield__label" for="email_register">{{ trans('auth.form.email') }}</label>
        {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
      </div>

      <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password') ? 'has-error' : '' }}">
        <input type="password" id="pw_register" name="password" class="mdl-textfield__input" >
        <label class="mdl-textfield__label" for="pw_register">{{ trans('auth.form.password') }}</label>
        {!! $errors->first('password', '<span class="form-error">:message</span>')!!}
      </div>

      <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password') ? 'has-error' : '' }}">
        <input type="password" id="pw_register_confirm" name="password_confirmation" class="mdl-textfield__input" >
        <label class="mdl-textfield__label" for="pw_register_confirm">{{ trans('auth.form.password_confirmation') }}</label>
        {!! $errors->first('password', '<span class="form-error">:message</span>')!!}
      </div>
    </div>

    <div class="form-group" style="margin-top: 2em;">
      <button class="btn btn-pink btn-lg btn-block" type="submit">
        {{ trans('auth.users.send_registration') }}
      </button>
    </div>
  </form>
</div>
</div>
@stop
