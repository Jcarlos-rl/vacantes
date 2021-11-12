@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-primary my-4">Vacantes {{ $category->name }}</h1>
        <p class="text-primary">A continuación se listan todas las vacantes disponibles para la categoria {{ $category->name }}</p>
        <div class="row">
            @foreach ($category->vacantes as $vacante)
                <div class="col-lg-6 mt-3">
                    <div class="container_vacancy">
                        <span class="text-white">BUAP</span>
                        <p class="text-white">{{ $vacante->name }}</p>
                        <a href="{{ route('vacante.show', $vacante->slug) }}" class="btn btn-secondary text-white">Aplicar</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
