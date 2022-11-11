@extends('layouts/admin')

@section('title', 'USUARIOS')

@section('breadcrumb')
 <h4 class="mb-0 font-size-18">Modificación de usuario</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="/usuarios">Listado general</a></li>
        <li class="breadcrumb-item active">Edición de registro</li>
    </ol>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
             {!!Form::model($usuarios,['method'=>'PUT','route'=>['usuarios.update',$usuarios->id], 'files'=>'true'])!!}
              <div class="card-body">
               <div class="row">

                        <div class="col-sm-6 mt-1">
                            <div class="form-group">
                                <label for="register-email" class="form-label">Nombre completo</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="register-name" name="name" placeholder="Nombre del usuario" aria-describedby="register-name" tabindex="2" value="{{ $usuarios->name }}" />
                                @error('name')
                                  <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                  </span>
                                @enderror
                             </div>
                         </div>
                           <div class="col-sm-6 mt-2">
                            <div class="form-group">
                                <label for="register-username" class="form-label">Usuario</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="register-username" name="username" placeholder="Ingresa el Usuario" aria-describedby="register-name" tabindex="2" value="{{ $usuarios->username }}" />
                                @error('username')
                                  <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                  </span>
                                @enderror
                             </div>
                         </div>
                         <div class="col-sm-6 mt-1">
                            <div class="form-group">
                                <label for="register-email" class="form-label">Correo electrónico</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="register-email" name="email" placeholder="john@example.com" aria-describedby="register-email" tabindex="2" value="{{ $usuarios->email }}" />
                                @error('email')
                                  <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                  </span>
                                @enderror
                             </div>
                         </div>
                         <div class="col-sm-6 mt-1">
                            <label for="nu_contacto">Empresa</label>
                          {!! Form::select('empresa_id', $empresas, null, [
                             'class' => 'form-control','placeholder' =>'Seleccione']) !!}
                         </div>




                          <div class="col-sm-6 mt-2">
                            <label for="nu_contacto">Estado del usuario</label>
                          {!! Form::select('status', $estados, null, [
                             'class' => 'form-control','placeholder' =>'Seleccione']) !!}
                          </div>
                        <div class="col-sm-6 mt-2">
                            <label for="nu_contacto">Role del usuario</label>
                          {!! Form::select('role_id', $roles, null, [
                             'class' => 'form-control','placeholder' =>'Seleccione']) !!}
                       </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group">
                                <label for="register-password" class="form-label">Contraseña</label>

                                <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                                  <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="register-password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="register-password" tabindex="3" />

                                </div>
                                @error('password')
                                  <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                  </span>
                                @enderror
                              </div>
                       </div>
                       <div class="col-sm-6 mt-2">
                            <div class="form-group">
                            <label for="register-password-confirm" class="form-label">Confirmación de contraseña</label>
                            <div class="input-group input-group-merge form-password-toggle">
                              <input type="password" class="form-control form-control-merge" id="register-password-confirm" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="register-password" tabindex="3" />

                            </div>
                          </div>
                       </div>
                    </div>
               </div>
              <div class="card-footer">
                <button class="btn btn-primary float-right mb-2">Guardar</button>
            </div>
              </div>
              {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
