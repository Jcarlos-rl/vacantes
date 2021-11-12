@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center text-primary">Convocatoria de plazas no academicas <span class="text-secondary">BUAP</span></h1>
        <p class="mt-3">Con fundamento en los artículos 3, fracción VII, de la Constitución Política de los Estados Unidos Mexicanos; 3o de la Ley, 21 del Estatuto Orgánico, 12, 16, 20, 21, 22 y 24 al 34 del Reglamento de Admisión, Promoción y Permanencia del Personal No Académico, todos los ordenamientos de la Benemérita Universidad Autónoma de Puebla:</p>
        <h3 class="text-center text-primary">CONVOCA</h3>
        <p class="mt-3 mb-5 text-center">Al concurso para el otorgamiento de las siguientes  plazas vacantes de tipo No Académico, de la modalidad de  contratación por tiempo determinado.</p>

        @foreach ($categories as $category)
            <a href="{{ route('category.show', $category->slug) }}">
                <span class="category_label">
                    {{$category->name}}
                </span>
            </a>
        @endforeach
        @foreach ($categories as $category)
            <h5 class="text-primary mt-5">Vacantes de <a href="{{ route('category.show', $category->slug) }}" class="text-secondary">{{ $category->name }}</a></h5>
            <div class="row mt-3">
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
        @endforeach
    </div>
@endsection
