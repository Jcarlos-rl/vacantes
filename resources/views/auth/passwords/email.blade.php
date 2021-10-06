@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center text-primary fw-bold">Restablecer contraseña</h3>

    <form class="row col-lg-8 offset-lg-2" method="POST" action="{{ route('password.email') }}">
        @if (session('status'))
            <div class="col-lg-12 alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
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
        <div class="col-lg-12 text-center mt-3">
            <button type="submit" class="btn btn-primary btn-lg text-white">Enviar enlace para restablecer contraseña</button>
        </div>
    </form>
</div>
@endsection
