@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center text-primary fw-bold">Formulario de registro</h3>
    <p class="text-center fw-light">¿Ya tienes una cuenta? <a class="text-secondary">Iniciar sesión</a></p>
    <form class="row mt-4 col-lg-10 offset-lg-1 register-form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="col-lg-6 mb-3">
            <label for="name" class="form-label text-primary">Nombre(s)</label>
            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-6 mb-3">
            <label for="apellidos" class="form-label text-primary">Apellidos</label>
            <input type="text" class="form-control form-control-lg @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos">

            @error('apellidos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-8 mb-3">
            <label for="email" class="form-label text-primary">E-mail</label>
            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" placeholder="ejemplo@correo.com" value="{{ old('email') }}">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-4 mb-3">
            <label for="telefono" class="form-label text-primary">Teléfono</label>
            <input type="phone" class="form-control form-control-lg @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}">

            @error('telefono')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-6 mb-3">
            <label for="password" class="form-label text-primary">Contraseña</label>
            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-6 mb-3">
            <label for="password_confirmation" class="form-label text-primary">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" class="form-control form-control-lg" name="password_confirmation" autocomplete="new-password">
        </div>
        <div class="col-lg-12 text-center mt-5">
            <button type="submit" class="btn btn-secondary btn-lg text-white">Registrarse</button>
        </div>
    </form>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
