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
        .bi{
            font-size: 35px;
            color:#45B1E1;
        }

        .dz-image img{
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-primary">{{$vacante->name}}</h1>
            <p class="text-primary">Folio: <span class="text-secondary">{{$vacante->folio}}</span></p>
        </div>
        <p class="text-secondary">{{ $vacante->category->name }}</p>
        <h4 class="text-primary mt-5">Descripción:</h4>
        <p class="text-primary">{{ $vacante->descripcion }}</p>
        <h4 class="text-primary my-4">Documentación solicitada:</h4>
        <div class="row">
            @if ($vacante->acta == 1)
                <div class="col-auto">
                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                    <p class="text-primary mt-2">Acta de nacimiento</p>
                </div>
            @endif
            @if ($vacante->ine == 1)
                <div class="col-auto">
                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                    <p class="text-primary mt-2">Identificación oficial</p>
                </div>
            @endif
            @if ($vacante->cv == 1)
                <div class="col-auto">
                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                    <p class="text-primary mt-2">CV con foto y documentos</p>
                </div>
            @endif
            @if ($vacante->ced_prof == 1)
                <div class="col-auto">
                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                    <p class="text-primary mt-2">Titulo y cédula profesional</p>
                </div>
            @endif
            @if ($vacante->ced_esp == 1)
                <div class="col-auto">
                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                        <p class="text-primary mt-2">Diploma y cédula de espcialidad</p>
                </div>
            @endif
            @if ($vacante->doc_migr == 1)
                <div class="col-auto">
                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                        <p class="text-primary mt-2">Documento migratorio</p>
                </div>
            @endif
            @if ($vacante->cert_med == 1)
                <div class="col-auto">
                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                        <p class="text-primary mt-2">Certificado médico (HUP)</p>
                </div>
            @endif
            @if ($vacante->cert_prep == 1)
                <div class="col-auto">
                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                    <p class="text-primary mt-2">Certificado preparatoria</p>
                </div>
            @endif
            @if ($vacante->cert_prep_tec == 1)
                <div class="col-auto">
                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                    <p class="text-primary mt-2">Certificado carrera técnica</p>
                </div>
            @endif
            @if ($vacante->curp == 1)
                <div class="col-auto">
                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                    <p class="text-primary mt-2">CURP</p>
                </div>
            @endif
            @if ($vacante->licencia_manejo == 1)
                <div class="col-auto">
                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                        <p class="text-primary mt-2">Licencia vigente para conducir</p>
                </div>
            @endif
            @if ($vacante->comprobante_domicilio == 1)
                <div class="col-auto">
                    <i class="bi bi-file-earmark-pdf d-flex justify-content-center"></i>
                    <p class="text-primary mt-2">Comprobante domicilio</p>
                </div>
            @endif
        </div>
        @guest
            <div class="alert alert-info text-center mt-4" role="alert">
                Lo sentimos, para postularte a la vacante necesita <a class="text-secondary" href="{{ route('login') }}"">Inicar sesión</a> ó <a class="text-secondary" href="{{ route('register') }}">Registrarse</a> en la plataforma.
            </div>
        @else
            @if(Auth::user()->email_verified_at != null)
                <div class="row">
                    <input id="id_user" type="hidden" value="{{ auth()->user()->id }}">
                    <h4 class="text-primary my-4 col-lg-12">Adjuntar documentación solicitada:</h4>
                    @if ($vacante->acta == 1)
                        <div class="col-12 col-lg-6 mt-3">
                            <h5 class="text-primary">Acta de nacimiento</h5>
                            <div id="acta" class="dropzone text-center"></div>
                        </div>
                    @endif
                    @if ($vacante->ine == 1)
                        <div class="col-12 col-lg-6 mt-3">
                            <h5 class="text-primary">Identificación oficial</h5>
                            <div id="ine" class="dropzone text-center"></div>
                        </div>
                    @endif
                    @if ($vacante->cv == 1)
                        <div class="col-12 col-lg-6 mt-3">
                            <h5 class="text-primary">CV con foto y documentos</h5>
                            <div id="cv" class="dropzone text-center"></div>
                        </div>
                    @endif
                    @if ($vacante->ced_prof == 1)
                        <div class="col-12 col-lg-6 mt-3">
                            <h5 class="text-primary">Titulo y cédula profesional</h5>
                            <div id="ced_prof" class="dropzone text-center"></div>
                        </div>
                    @endif
                    @if ($vacante->ced_esp == 1)
                        <div class="col-12 col-lg-6 mt-3">
                            <h5 class="text-primary">Diploma y cédula de espcialidad</h5>
                            <div id="ced_esp" class="dropzone text-center"></div>
                        </div>
                    @endif
                    @if ($vacante->doc_migr == 1)
                        <div class="col-12 col-lg-6 mt-3">
                            <h5 class="text-primary">Documento migratorio</h5>
                            <div id="doc_migr" class="dropzone text-center"></div>
                        </div>
                    @endif
                    @if ($vacante->cert_med == 1)
                        <div class="col-12 col-lg-6 mt-3">
                            <h5 class="text-primary">Certificado médico (HUP)</h5>
                            <div id="cert_med" class="dropzone text-center"></div>
                        </div>
                    @endif
                    @if ($vacante->cert_prep == 1)
                        <div class="col-12 col-lg-6 mt-3">
                            <h5 class="text-primary">Certificado preparatoria</h5>
                            <div id="cert_prep" class="dropzone text-center"></div>
                        </div>
                    @endif
                    @if ($vacante->cert_prep_tec == 1)
                        <div class="col-12 col-lg-6 mt-3">
                            <h5 class="text-primary">Certificado carrera técnica</h5>
                            <div id="cert_prep_tec" class="dropzone text-center"></div>
                        </div>
                    @endif
                    @if ($vacante->curp == 1)
                        <div class="col-12 col-lg-6 mt-3">
                            <h5 class="text-primary">CURP</h5>
                            <div id="curp" class="dropzone text-center"></div>
                        </div>
                    @endif
                    @if ($vacante->licencia_manejo == 1)
                        <div class="col-12 col-lg-6 mt-3">
                            <h5 class="text-primary">Licencia vigente para conducir</h5>
                            <div id="licencia_manejo" class="dropzone text-center"></div>
                        </div>
                    @endif
                    @if ($vacante->comprobante_domicilio == 1)
                        <div class="col-12 col-lg-6 mt-3">
                            <h5 class="text-primary">Comprobante domicilio</h5>
                            <div id="comprobante_domicilio" class="dropzone text-center"></div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 offset-3 mt-5">
                    <button id="btn_postularse" class="btn btn-secondary w-100 text-white">Postularse</button>
                </div>
            @else
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <div class="alert alert-info text-center mt-4" role="alert">
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            @endif

        @endguest
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    <script>
        Dropzone.autoDiscover = false;
        const dropzoneItems = ['acta', 'ine', 'cv', 'ced_prof', 'ced_esp', 'doc_migr', 'cert_med', 'cert_prep', 'cert_prep_tec', 'curp','licencia_manejo', 'comprobante_domicilio'],
            alert = document.getElementById('notification_alert');
        document.addEventListener('DOMContentLoaded', () => {
            dropzoneItems.forEach(item => {
                if(document.getElementById(item) != null){
                    const user_id = document.getElementById('id_user').value;
                    new Dropzone(`#${item}`, {
                        url: `/vacantes/files`,
                        dictDefaultMessage: `Cagar documentos`,
                        addRemoveLinks: true,
                        dictRemoveFile: 'Eliminar archivo',
                        params: { 'type' : item },
                        headers: {
                            'X-CSRF-TOKEN' : document.querySelector('meta[name=csrf-token]').content
                        },
                        accept: function(file, done) {
                            const dropFiles = file.previewElement.parentNode.childNodes;
                            if(file.type != 'application/pdf'){
                                if(dropFiles.length === 2)file.previewElement.parentNode.classList.remove('dz-started');
                                file.previewElement.parentNode.removeChild(file.previewElement);
                                alert.innerHTML = `
                                    <div class="alert alert-danger" role="alert">
                                        Lo sentimos, solo se permiten archivos con formato PDF.
                                    </div>
                                `;
                                setTimeout(function() {
                                    alert.innerHTML = ``;
                                }, 3000);
                            }else{
                                if(dropFiles.length > 2){
                                    const id = dropFiles[1].childNodes[1].childNodes[0].getAttribute('id');
                                    if(id != null){
                                        axios.post(`/vacantes/deleteFile/${id}`)
                                        .then(res=>{
                                            dropFiles[1].parentNode.removeChild(dropFiles[1]);
                                            done();
                                        })
                                    }else{
                                        dropFiles[1].parentNode.removeChild(dropFiles[1]);
                                        done();
                                    }
                                }else{
                                    done();
                                }
                            }
                        },
                        init: function(file) {
                            const params = { type: item , id: user_id};

                            axios.post('/vacantes/getFiles', params)
                                .then(res=>{
                                    if(res.data[0] != undefined){
                                        const data = res.data[0];

                                        let imgPublic = {};
                                        imgPublic.size = 1234;
                                        imgPublic.name = data.name;

                                        this.options.addedfile.call(this, imgPublic);
                                        // this.options.thumbnail.call(this, imgPublic, `/storage/documents/${user_id}/${data.name}`);

                                        imgPublic.previewElement.classList.add('dz-success');
                                        imgPublic.previewElement.classList.add('dz-complete');
                                        imgPublic.previewElement.childNodes[1].childNodes[0].setAttribute('id', data.id);
                                    }
                                })
                        },
                        success: function(file, resp) {
                            file.previewElement.childNodes[1].childNodes[0].setAttribute('id', resp.data.id);
                        },
                        removedfile: function(file, resp) {

                            const id = file.previewElement.childNodes[1].childNodes[0].getAttribute('id');
                            if(id != null){
                                axios.post(`/vacantes/deleteFile/${id}`)
                                    .then(res=>{
                                        file.previewElement.parentNode.removeChild(file.previewElement);
                                    })
                            }else{
                                file.previewElement.parentNode.removeChild(file.previewElement);
                            }

                        }
                    })
                }
            })
        })

        const btn = document.getElementById('btn_postularse');
        btn.addEventListener('click', ()=>{
            let band = [],
                i = 0,
                success = true;

            dropzoneItems.forEach(item=>{
                if(document.getElementById(item) != null) band[i++] = (document.getElementById(item).childNodes[1] === undefined) ? 'valio' : '';
            });

            band.forEach(element => {
                success &= (element == '') ? true : false
            })

            if(success){
                alert.innerHTML = `
                    <div class="alert alert-success" role="alert">
                        Felicidades, tu postulación fue realizada.
                    </div>
                `;
                setTimeout(function() {
                    alert.innerHTML = ``;
                }, 3000);
            }else{
                alert.innerHTML = `
                    <div class="alert alert-danger" role="alert">
                        Lo sentimos, debes de adjuntar todos los documentos solicitados.
                    </div>
                `;
                setTimeout(function() {
                    alert.innerHTML = ``;
                }, 3000);
            }
        })
    </script>
@endsection
