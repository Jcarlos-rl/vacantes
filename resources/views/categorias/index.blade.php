@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1 class="text-primary">Categorias</h1>
            <button type="button" class="btn btn-secondary white-text" data-toggle="modal" data-target="#nuevaRegistroJuridico">
                Agregar
            </button>
        </div>
        <table class="table table-hover my-3">
            <thead>
                <tr>
                    <th class="text-center text-secondary" scope="col">Nombre</th>
                    <th class="text-center text-secondary" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="text-center">
                            {{ $category->name }}
                        </td>
                        <td class="text-center">

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="nuevaRegistroJuridico" tabindex="-1" aria-labelledby="nuevaRegistroJuridicoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-fieldset">Paso 1: Buscar elemento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-fieldset" id="btn-cancelar-fieldset">Cancelar</button>
                    <button type="button" class="btn btn-ssc btn-fieldset" id="btn-continuar-fieldset">Guardar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
