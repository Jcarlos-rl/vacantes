@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center text-primary fw-bold">Iniciar sesión</h3>
    <p class="text-center fw-light">Escribe el correo asociado con tu cuenta para iniciar sesión.</p>
    <form class="row col-lg-8 offset-lg-2" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="col-lg-12 my-3">
            <label for="email" class="form-label text-primary">E-mail</label>
            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-12 mb-3">
            <label for="password" class="form-label text-primary">Contraseña</label>
            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-12">
            <div class="form-check text-center">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
        <div class="col-lg-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
</div>
@endsection
