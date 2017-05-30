@extends('welcome')

@section('content')

  <form action="{{ route('sessions.store') }}" method="POST" role="form" class="form__auth">
    {!! csrf_field() !!}

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

    <div class="form-group">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="remember" value="{{ old('remember', 1) }}" checked>
          {{ trans('auth.sessions.remember') }}
          <span class="text-danger">
            {{ trans('auth.sessions.remember_help') }}
          </span>
        </label>
      </div>
    </div>

    <div class="form-group">
      <button class="btn btn-primary btn-lg btn-block" type="submit">
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
        <small class="help-block">
          {{  trans('auth.sessions.caveat_for_social') }}
        </small>
      </p>
    </div>
  </form>
@stop
