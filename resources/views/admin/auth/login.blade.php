@extends('admin.layouts.layout')

@section('content')
    <div class="h-100 bg-cover bg-center py-5 d-flex align-items-center"
        style="background-color: #cceac8;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-4 mx-auto">
                    <div class="card text-left">
                        <div class="card-body">
                            <div class="mb-5 text-center">
                                <img src="{{ asset('assets/img/logo.png') }}" class="mw-100 mb-4" height="100">
                                <h1 class="h3 text-primary mb-0">{{ trans('Welcome to') }} {{ env('APP_NAME') }}</h1>
                                <p>{{ trans('Login to your account.') }}</p>
                            </div>
                            @error('login')
                                <span class="invalid-feedback d-block mb-3" style="font-size: 14px;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <form class="pad-hor" method="POST" role="form" action="{{ route('admin.loginpost') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        value="{{ old('email') }}" required autofocus placeholder="{{ trans('Email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required placeholder="{{ trans('Password') }}">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <div class="text-left">
                                            <label class="aiz-checkbox">
                                                <input type="checkbox" name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                <span>{{ trans('Remember Me') }}</span>
                                                <span class="aiz-square-check"></span>
                                            </label>
                                        </div>
                                    </div>
                                    @if (env('MAIL_USERNAME') != null && env('MAIL_PASSWORD') != null)
                                        <div class="col-sm-6">
                                            <div class="text-right">
                                                <a href="{{ route('password.request') }}"
                                                    class="text-reset fs-14">{{ trans('Forgot password ?') }}</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    {{ trans('Login') }}
                                </button>
                            </form>
                            @if (env('DEMO_MODE') == 'On')
                                <div class="mt-4">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>admin@example.com</td>
                                                <td>123456</td>
                                                <td><button class="btn btn-info btn-xs"
                                                        onclick="autoFill()">{{ trans('Copy') }}</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function autoFill() {
            $('#email').val('admin@example.com');
            $('#password').val('123456');
        }
    </script>
@endsection
