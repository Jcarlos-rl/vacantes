@extends('layouts.app')


@section('content')
    <div class="container">
        @if ($postulant)
            <div class="alert alert-success" role="alert">
                Tienes una postulación activa.
            </div>

            <h3 class="text-primary my-3">Información de la vacante</h3>
            <p class="text-primary mb-0">Nombre: <span class="text-secondary">{{ $vacancy->name }}</span></p>
            <p class="text-primary mb-0">Folio: <span class="text-secondary">{{ $vacancy->folio }}</span></p>
            <p class="text-primary mb-0">Descripción: <span class="text-secondary">{{ $vacancy->descripcion }}</span></p>
            <p class="text-primary">Documantación solicitada:</p>
            <div class="row my-3">
                @if ($vacancy->acta == 1)
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                        <p class="text-primary mt-2">Acta de nacimiento</p>
                    </div>
                @endif
                @if ($vacancy->ine == 1)
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                        <p class="text-primary mt-2">Identificación oficial</p>
                    </div>
                @endif
                @if ($vacancy->cv == 1)
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                        <p class="text-primary mt-2">CV con foto y documentos</p>
                    </div>
                @endif
                @if ($vacancy->ced_prof == 1)
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                        <p class="text-primary mt-2">Titulo y cédula profesional</p>
                    </div>
                @endif
                @if ($vacancy->ced_esp == 1)
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                            <p class="text-primary mt-2">Diploma y cédula de espcialidad</p>
                    </div>
                @endif
                @if ($vacancy->doc_migr == 1)
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                            <p class="text-primary mt-2">Documento migratorio</p>
                    </div>
                @endif
                @if ($vacancy->cert_med == 1)
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                            <p class="text-primary mt-2">Certificado médico (HUP)</p>
                    </div>
                @endif
                @if ($vacancy->cert_prep == 1)
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                        <p class="text-primary mt-2">Certificado preparatoria</p>
                    </div>
                @endif
                @if ($vacancy->cert_prep_tec == 1)
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                        <p class="text-primary mt-2">Certificado carrera técnica</p>
                    </div>
                @endif
                @if ($vacancy->curp == 1)
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                        <p class="text-primary mt-2">CURP</p>
                    </div>
                @endif
                @if ($vacancy->licencia_manejo == 1)
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                            <p class="text-primary mt-2">Licencia vigente para conducir</p>
                    </div>
                @endif
                @if ($vacancy->comprobante_domicilio == 1)
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                        <p class="text-primary mt-2">Comprobante domicilio</p>
                    </div>
                @endif
            </div>

            <p class="text-primary">Status: <span class="text-secondary">Revisión de documentación</span></p>
        @else
            <div class="alert alert-info" role="alert">
                Lo sentimos, no tienes postulación activa.
            </div>
        @endif
    </div
@endsection

