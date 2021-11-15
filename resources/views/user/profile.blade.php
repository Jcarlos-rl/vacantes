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
        <div class="d-flex justify-content-between aling-items-center my-3">
            <h4 class="text-primary">Mis datos</h4>
            @if (!$postulant)
                <button type="button" class="btn btn-secondary btn-lg text-white" id="btn_edit">Editar</button>
            @endif
        </div>
        <form class="row col-lg-12 edit_profile" method="POST" action="">
            @csrf
            <div class="col-lg-6 mb-3">
                <label for="name" class="form-label text-primary">Nombre(s)</label>
                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ (old('name') != null) ? old('name') :
                $user->name  }}" disabled>
                <input type="hidden" value="{{ $user->id }}" id="id_user">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-6 mb-3">
                <label for="apellidos" class="form-label text-primary">Apellidos</label>
                <input type="text" class="form-control form-control-lg @error('apellidos') is-invalid @enderror" id="apellidos" value="{{ (old('apellidos') != null) ? old('apellidos') : $user->apellidos }}" name="apellidos" disabled>

                @error('apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-8 mb-3">
                <label for="email" class="form-label text-primary">E-mail</label>
                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" placeholder="ejemplo@correo.com" value="{{ (old('email') != null) ? old('email') : $user->email }}" disabled>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-4 mb-3">
                <label for="telefono" class="form-label text-primary">Teléfono</label>
                <input type="phone" class="form-control form-control-lg @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ (old('telefono') != null) ? old('telefono') : $user->telefono }}" disabled>

                @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <p id="change_password" class="text-secondary col-lg-12 my-2">Cambiar contraseña</p>
            <div class="col-lg-6 mb-3" id="content_password">
                <label for="password" class="form-label text-primary">Contraseña</label>
                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-6 mb-3" id="content_confirmation">
                <label for="password_confirmation" class="form-label text-primary">Confirmar contraseña</label>
                <input id="password_confirmation" type="password" class="form-control form-control-lg" name="password_confirmation" autocomplete="new-password">
            </div>
            <div class="col-lg-12 text-center mt-3" id="content_buttons">
                <button type="submit" class="btn btn-primary btn-lg text-white">Guardar cambios</button>
                <button type="button" class="btn btn-secondary btn-lg text-white ml-3" id="btn_cancel">Cancelar</button>
            </div>
        </form>
        <h4 class="text-primary my-3">Mi documentación</h4>
        <div class="row">
            <div class="col-12 col-lg-6 mt-3">
                <h5 class="text-primary">Acta de nacimiento</h5>
                <div class="d-flex justify-content-end" id="content_acta">
                </div>
                <div id="acta" class="dropzone text-center"></div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <h5 class="text-primary">Identificación oficial</h5>
                <div class="d-flex justify-content-end" id="content_ine">
                </div>
                <div id="ine" class="dropzone text-center"></div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <h5 class="text-primary">CV con foto y documentos</h5>
                <div class="d-flex justify-content-end" id="content_cv">
                </div>
                <div id="cv" class="dropzone text-center"></div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <h5 class="text-primary">Titulo y cédula profesional</h5>
                <div class="d-flex justify-content-end" id="content_ced_prof">
                </div>
                <div id="ced_prof" class="dropzone text-center"></div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <h5 class="text-primary">Diploma y cédula de espcialidad</h5>
                <div class="d-flex justify-content-end" id="content_ced_esp">
                </div>
                <div id="ced_esp" class="dropzone text-center"></div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <h5 class="text-primary">Documento migratorio</h5>
                <div class="d-flex justify-content-end" id="content_doc_migr">
                </div>
                <div id="doc_migr" class="dropzone text-center"></div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <h5 class="text-primary">Certificado médico (HUP)</h5>
                <div class="d-flex justify-content-end" id="content_cert_med">
                </div>
                <div id="cert_med" class="dropzone text-center"></div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <h5 class="text-primary">Certificado preparatoria</h5>
                <div class="d-flex justify-content-end" id="content_cert_prep">
                </div>
                <div id="cert_prep" class="dropzone text-center"></div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <h5 class="text-primary">Certificado carrera técnica</h5>
                <div class="d-flex justify-content-end" id="content_cert_prep_tec">
                </div>
                <div id="cert_prep_tec" class="dropzone text-center"></div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <h5 class="text-primary">CURP</h5>
                <div class="d-flex justify-content-end" id="content_curp">
                </div>
                <div id="curp" class="dropzone text-center"></div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <h5 class="text-primary">Licencia vigente para conducir</h5>
                <div class="d-flex justify-content-end" id="content_licencia_manejo">
                </div>
                <div id="licencia_manejo" class="dropzone text-center"></div>
            </div>
            <div class="col-12 col-lg-6 mt-3">
                <h5 class="text-primary">Comprobante domicilio</h5>
                <div class="d-flex justify-content-end" id="content_comprobante_domicilio">
                </div>
                <div id="comprobante_domicilio" class="dropzone text-center"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    <script>
        Dropzone.autoDiscover = false;
        const dropzoneItems = ['acta', 'ine', 'cv', 'ced_prof', 'ced_esp', 'doc_migr', 'cert_med', 'cert_prep', 'cert_prep_tec', 'curp','licencia_manejo', 'comprobante_domicilio'],
            alert = document.getElementById('notification_alert'),
            user_id = document.getElementById('id_user').value;

        let band = (document.getElementById('btn_edit') === null ) ? false : true;
        document.addEventListener('DOMContentLoaded', () => {
            dropzoneItems.forEach(item => {
                if(document.getElementById(item) != null){
                    new Dropzone(`#${item}`, {
                        url: `/vacantes/files`,
                        dictDefaultMessage: `Cagar documentos`,
                        addRemoveLinks: band,
                        dictRemoveFile: 'Eliminar archivo',
                        params: { 'type' : item },
                        headers: {
                            'X-CSRF-TOKEN' : document.querySelector('meta[name=csrf-token]').content
                        },
                        accept: function(file, done) {
                            const dropFiles = file.previewElement.parentNode.childNodes;
                            if(band){
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
                            }else{
                                file.previewElement.parentNode.removeChild(file.previewElement);
                                alert.innerHTML = `
                                    <div class="alert alert-warning" role="alert">
                                        Lo sentimos, tienes una postulación activa y no puedes realizar cambios en tu documentación.
                                    </div>
                                `;
                                setTimeout(function() {
                                    alert.innerHTML = ``;
                                }, 3000);
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

                                        imgPublic.previewElement.classList.add('dz-success');
                                        imgPublic.previewElement.classList.add('dz-complete');
                                        imgPublic.previewElement.childNodes[1].childNodes[0].setAttribute('id', data.id);

                                        document.getElementById(`content_${item}`).innerHTML = `
                                            <a class="text-secondary" target="_blank" href="/storage/documents/${user_id}/${data.name}">Ver documento</a>
                                        `;
                                    }
                                })
                        },
                        success: function(file, resp) {
                            file.previewElement.childNodes[1].childNodes[0].setAttribute('id', resp.data.id);

                            document.getElementById(`content_${item}`).innerHTML = `
                                <a class="text-secondary" target="_blank" href="/storage/documents/${user_id}/${resp.data.name}">Ver documento</a>
                            `;
                        },
                        removedfile: function(file, resp) {

                            const id = file.previewElement.childNodes[1].childNodes[0].getAttribute('id');
                            if(id != null){
                                axios.post(`/vacantes/deleteFile/${id}`)
                                    .then(res=>{
                                        file.previewElement.parentNode.removeChild(file.previewElement);
                                        document.getElementById(`content_${item}`).innerHTML = '';
                                    })
                            }else{
                                document.getElementById(`content_${item}`).innerHTML = '';
                                file.previewElement.parentNode.removeChild(file.previewElement);
                            }

                        }
                    })
                }
            })
        })

        const btn_edit = document.getElementById('btn_edit'),
            btn_cancel = document.getElementById('btn_cancel'),
            change_password = document.getElementById('change_password');

        btn_edit.addEventListener('click',()=>{
            document.getElementById('name').removeAttribute('disabled');
            document.getElementById('apellidos').removeAttribute('disabled');
            document.getElementById('email').removeAttribute('disabled');
            document.getElementById('telefono').removeAttribute('disabled');
            document.getElementById('change_password').style.display = 'block';
            document.getElementById('content_buttons').style.display = 'block';
        });

        btn_cancel.addEventListener('click', ()=>{
            document.getElementById('name').setAttribute('disabled', '');
            document.getElementById('apellidos').setAttribute('disabled', '');
            document.getElementById('email').setAttribute('disabled', '');
            document.getElementById('telefono').setAttribute('disabled', '');
            document.getElementById('change_password').style.display = 'none';
            document.getElementById('content_buttons').style.display = 'none';
        })

        change_password.addEventListener('click', ()=>{
            document.getElementById('content_password').style.display = 'block';
            document.getElementById('content_confirmation').style.display = 'block';
        })



    </script>
@endsection
