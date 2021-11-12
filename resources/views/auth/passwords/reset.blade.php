@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center text-primary fw-bold">Restablecer contraseña</h3>
    <form class="row col-lg-8 offset-lg-2" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="col-lg-12 my-3">
            <label for="email" class="form-label text-primary">E-mail</label>
            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ $email ?? old('email') }}">

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
        <div class="col-lg-12 mb-3">
            <label for="password-confirm" class="form-label text-primary">Confirmar contraseña</label>
            <input type="password" class="form-control form-control-lg" id="password-confirm" name="password_confirmation">
        </div>
        <div class="col-lg-12 text-center mt-3">
            <button type="submit" class="btn btn-primary btn-lg text-white">Restablecer contraseña</button>
        </div>
    </form>
</div>
@endsection
