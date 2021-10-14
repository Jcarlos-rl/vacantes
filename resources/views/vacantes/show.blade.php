@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .dropzone{
            border-style: dotted;
            border-color: #45B1E1;
            border-radius: 5px;
            background: transparent;
            color: #123C5D;
            font-size: 16px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-primary">{{$vacante->name}}</h1>
            <p class="text-primary">Folio: <span class="text-secondary">{{$vacante->folio}}</span></p>
        </div>
        <p class="text-secondary">{{ $vacante->category_id }}</p>
        <h4 class="text-primary mt-5">Descripción:</h4>
        <p class="text-primary">{{ $vacante->descripcion }}</p>
        <h4 class="text-primary mt-4">Documentación solicitada:</h4>
        {{-- <div id="dropzone" class="dropzone "></div> --}}
        <div class="row mt-3">
            @if ($vacante->acta == 1)
                <div class="col-12 col-lg-6 mt-3">
                    <h5 class="text-primary">Acta de nacimiento</h5>
                    <div id="dropzone" class="dropzone "></div>
                </div>
            @endif
            @if ($vacante->ine == 1)
                <div class="col-12 col-lg-6 mt-3">
                    <h5 class="text-primary">INE</h5>
                    <div id="dropzone" class="dropzone "></div>
                </div>
            @endif
            @if ($vacante->cv == 1)
                <div class="col-12 col-lg-6 mt-3">
                    <h5 class="text-primary">CV</h5>
                    <div id="dropzone" class="dropzone "></div>
                </div>
            @endif
            @if ($vacante->ced_prof == 1)
                <div class="col-12 col-lg-6 mt-3">
                    <h5 class="text-primary">Cedula Profesional</h5>
                    <div id="dropzone" class="dropzone "></div>
                </div>
            @endif
            @if ($vacante->ced_esp == 1)
                <div class="col-12 col-lg-6 mt-3">
                    <h5 class="text-primary">Cedula de Espcialidad</h5>
                    <div id="dropzone" class="dropzone "></div>
                </div>
            @endif
            @if ($vacante->doc_migr == 1)
                <div class="col-12 col-lg-6 mt-3">
                    <h5 class="text-primary">Documento Migratorio</h5>
                    <div id="dropzone" class="dropzone "></div>
                </div>
            @endif
            @if ($vacante->cert_med == 1)
                <div class="col-12 col-lg-6 mt-3">
                    <h5 class="text-primary">Certificado Medico</h5>
                    <div id="dropzone" class="dropzone "></div>
                </div>
            @endif
            @if ($vacante->cert_prep == 1)
                <div class="col-12 col-lg-6 mt-3">
                    <h5 class="text-primary">Certificado de Preparatoria</h5>
                    <div id="dropzone" class="dropzone "></div>
                </div>
            @endif
            @if ($vacante->cert_prep_tec == 1)
                <div class="col-12 col-lg-6 mt-3">
                    <h5 class="text-primary">Certificado de </h5>
                    <div id="dropzone" class="dropzone "></div>
                </div>
            @endif
            @if ($vacante->curp == 1)
                <div class="col-12 col-lg-6 mt-3">
                    <h5 class="text-primary">Curp</h5>
                    <div id="dropzone" class="dropzone "></div>
                </div>
            @endif
            @if ($vacante->licencia_manejo == 1)
                <div class="col-12 col-lg-6 mt-3">
                    <h5 class="text-primary">Licencia de Manejo</h5>
                    <div id="dropzone" class="dropzone "></div>
                </div>
            @endif
            @if ($vacante->comprobante_domicilio == 1)
                <div class="col-12 col-lg-6 mt-3">
                    <h5 class="text-primary">Comprobante de Domicilio</h5>
                    <div id="dropzone" class="dropzone "></div>
                </div>
            @endif
        </div>
    </div>
    <h1>{{$vacante}}</h1>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', ()=>{
            const dropzone = new Dropzone('#dropzone', {
                url: '/vacantes/image'
            })
        })
    </script>
@endsection
