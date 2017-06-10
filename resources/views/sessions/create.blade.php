@extends('welcome')

@section('content')
  <div class="full-content">
    <form action="{{ route('sessions.store') }}" method="POST" role="form" class="form__auth">
      {!! csrf_field() !!}

      <div class="register-box text-center">
      @if ($return = request('return'))
        <input type="hidden" name="return" value="{{ $return }}">
      @endif

      <div class="page-header">
        <h4>
          {{ trans('auth.sessions.title') }}
        </h4>
        <p class="text-muted">
          {{ trans('auth.sessions.description') }}
        </p>
      </div>

    <div class="form-group-center">

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

      <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'has-error' : '' }}">
        <input type="email" id="sample3" name="email" class="mdl-textfield__input" value="{{ old('email') }}" />
        <label class="mdl-textfield__label" for="sample3">{{ trans('auth.form.email') }}</label>
        {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
      </div>

      <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('password') ? 'has-error' : '' }}">
        <input type="password" id="login_pw" name="password" class="mdl-textfield__input" >
        <label class="mdl-textfield__label" for="login_pw">{{ trans('auth.form.password') }}</label>
        {!! $errors->first('password', '<span class="form-error">:message</span>')!!}
      </div>
    </div>

      <div class="form-group">
        <button class="btn btn-pink btn-lg btn-block" type="submit">
          {{ trans('auth.sessions.title') }}
        </button>
      </div>

      <div>
        <p class="text-center">
          {!! trans('auth.sessions.ask_registration', ['url' => route('users.create')]) !!}
        </p>
        <p class="text-center">
          {!! trans('auth.sessions.ask_forgot', ['url' => route('remind.create')]) !!}
        </p>
        <p class="text-center">
          <small class="help-block text-white">
            {{  trans('auth.sessions.caveat_for_social') }}
          </small>
        </p>
      </div>
    </form>
  </div>
</div>
@stop
