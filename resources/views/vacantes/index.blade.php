@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="my-4 text-primary">Listado de vacantes</h1>
            <a href="{{ route('vacante.create') }}" class="btn btn-secondary text-white">Nueva vacante</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center text-secondary" scope="col">Nombre</th>
                    <th class="text-center text-secondary" scope="col">Folio</th>
                    <th class="text-center text-secondary" scope="col">Categoria</th>
                    <th class="text-center text-secondary" scope="col">Estatus</th>
                    <th class="text-center text-secondary" scope="col">Descripción</th>
                    <th class="text-center text-secondary" scope="col">Postulantes</th>
                    <th class="text-center text-secondary" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacantes as $vacante)
                    <tr>
                        <td class="text-center">
                            {{ $vacante->name }}
                        </td>
                        <td class="text-center">
                            {{ $vacante->folio }}
                        </td>
                        <td class="text-center">
                            {{ $vacante->category->name }}
                        </td>
                        <td class="text-center">
                            {{ ($vacante->status == 1) ? 'Disponible' : 'No disponible' }}
                        </td>
                        <td class="text-center" style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;">
                            {{ $vacante->descripcion }}
                        </td>
                        <td class="text-center">
                            @php
                                $activos = $rechazados = 0;

                                foreach ($vacante->postulants as $postulant) {
                                    if($postulant->status == 0) $rechazados++;
                                    if($postulant->status == 1) $activos++;
                                }
                            @endphp
                            <p class="mb-0"><span class="text-secondary">{{ $activos }}</span> <span class="text-red">{{ $rechazados }}</span></p>
                            <a href="{{ route('vacante.postulants', $vacante->slug) }}">Ver postulantes</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
