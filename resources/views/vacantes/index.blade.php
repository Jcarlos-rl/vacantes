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
                    <th scope="col">Nombre</th>
                    <th scope="col">Folio</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Descripción</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacantes as $vacante)
                    <tr>
                        <td>
                            {{ $vacante->name }}
                        </td>
                        <td>
                            {{ $vacante->folio }}
                        </td>
                        <td>
                            {{ $vacante->category->name }}
                        </td>
                        <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;">
                            {{ $vacante->descripcion }}
                        </td>
                        <td>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
