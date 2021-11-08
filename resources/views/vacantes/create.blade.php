@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-primary">Nueva vacante</h1>
        <form class="row" method="POST" action="{{ route('vacante.store') }}">
            @csrf
            <div class="col-lg-6 mb-3">
                <label for="nombre" class="form-label text-primary">Nombre de la vacante</label>
                <input type="text" class="form-control form-control-lg @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">

                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-4 mb-3">
                <label for="categoria" class="form-label text-primary">Categoria de la vacante</label>

                <select class="form-control form-control-lg @error('categoria') is-invalid @enderror" name="categoria" id="categoria">
                    <option disabled selected>Selecciona una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{ old('categoria') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>

                @error('categoria')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-2 mb-3">
                <label for="folio" class="form-label text-primary">Folio de la vacante</label>
                <input type="text" class="form-control form-control-lg @error('folio') is-invalid @enderror" id="folio" name="folio" value="{{ old('folio') }}">

                @error('folio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-12 mb-3">
                <label for="descripcion" class="form-label text-primary">Descripción de la vacante</label>
                <textarea class="form-control form-control-lg @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3" value="{{ old('descripcion') }}"></textarea>

                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <h4 class="col-lg-12 text-primary">Documentación solicitada</h2>
            <div class="col-lg-auto mb-2">
                <input class="form-check-input" type="checkbox" name="acta" value="acta" id="acta">
                <label class="form-check-label" for="acta">
                    Acta de nacimiento
                </label>
            </div>
            <div class="col-lg-auto mb-2">
                <input class="form-check-input" type="checkbox" name="ine" value="ine" id="ine">
                <label class="form-check-label" for="ine">
                    Identificacion oficial
                </label>
            </div>
            <div class="col-lg-auto mb-2">
                <input class="form-check-input" type="checkbox" name="cv" value="cv" id="cv">
                <label class="form-check-label" for="cv">
                    CV con foto y documentos
                </label>
            </div>
            <div class="col-lg-auto mb-2">
                <input class="form-check-input" type="checkbox" name="ced_prof" value="ced_prof" id="ced_prof">
                <label class="form-check-label" for="ced_prof">
                    Titulo y cédula profesional
                </label>
            </div>
            <div class="col-lg-auto mb-2">
                <input class="form-check-input" type="checkbox" name="ced_esp" value="ced_esp" id="ced_esp">
                <label class="form-check-label" for="ced_esp">
                    Diploma y cédula de especialidad
                </label>
            </div>
            <div class="col-lg-auto mb-2">
                <input class="form-check-input" type="checkbox" name="doc_migr" value="doc_migr" id="doc_migr">
                <label class="form-check-label" for="doc_migr">
                    Documentos migratorio
                </label>
            </div>
            <div class="col-lg-auto mb-2">
                <input class="form-check-input" type="checkbox" name="cert_med" value="cert_med" id="cert_med">
                <label class="form-check-label" for="cert_med">
                    Certificado médico(HUP)
                </label>
            </div>
            <div class="col-lg-auto mb-2">
                <input class="form-check-input" type="checkbox" name="cert_prep" value="cert_prep" id="cert_prep">
                <label class="form-check-label" for="cert_prep">
                    Certificado preparatoria
                </label>
            </div>
            <div class="col-lg-auto mb-2">
                <input class="form-check-input" type="checkbox" name="cert_prep_tec" value="cert_prep_tec" id="cert_prep_tec">
                <label class="form-check-label" for="cert_prep_tec">
                    Certificado carrera técnica
                </label>
            </div>
            <div class="col-lg-auto mb-2">
                <input class="form-check-input" type="checkbox" name="curp" value="curp" id="curp">
                <label class="form-check-label" for="curp">
                    CURP
                </label>
            </div>
            <div class="col-lg-auto mb-2">
                <input class="form-check-input" type="checkbox" name="licencia_manejo" value="licencia_manejo" id="licencia_manejo">
                <label class="form-check-label" for="licencia_manejo">
                    Licencia vigente para conducir
                </label>
            </div>
            <div class="col-lg-auto mb-2">
                <input class="form-check-input" type="checkbox" name="comprobante_domicilio" value="comprobante_domicilio" id="comprobante_domicilio">
                <label class="form-check-label" for="comprobante_domicilio">
                    Comprobante domicilio
                </label>
            </div>
            <div class="col-lg-12 text-center mt-3">
                <button type="submit" class="btn btn-primary btn-lg text-white">Guardar</button>
            </div>
        </form>
    </div>
@endsection
