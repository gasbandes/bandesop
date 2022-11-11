@extends('layouts.admin')

@section('title', 'ROLES')
@section('breadcrumb')
 <h4 class="mb-0 font-size-18">Registro de nuevo role</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="/roles">Listado general</a></li>
        <li class="breadcrumb-item active">Nuevo registro</li>
    </ol>
@endsection
@section('styles')
 <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset('/assets/libs/animate.css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/config-page.css') }}">
@endsection
@section('content')
@include('sweetalert::alert')
  <div class="mt-2">
      <div class="row">
    <div class="col-sm-12">
        <div class="card">

                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h3>Nuevo role</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nombre del nuevo Role <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" required>
                            </div>


                            <hr>

                            <div class="form-group">
                                <label for="permissions">
                                    Permisos <span class="text-danger">*</span>
                                </label>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="select-all">
                                    <label class="custom-control-label" for="select-all">Asignar todos los permisos</label>
                                </div>
                            </div>
                            <div class="row">
                                 <!-- Usuarios Permission -->
                                <div class="mt-2 col-lg-4 col-md-6">
                                    <div class="card h-100 border-0 shadow">
                                        <div class="card-header">
                                            Usuarios
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="acceso_usuarios" name="permissions[]"
                                                               value="acceso_usuarios" {{ old('acceso_usuarios') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="acceso_usuarios">Acceso</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Ver Usuario" name="permissions[]"
                                                               value="Ver Usuario" {{ old('Ver Usuario') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Ver Usuario">Ver</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Registrar Usuario" name="permissions[]"
                                                               value="Registrar Usuario" {{ old('Registrar Usuario') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Registrar Usuario">Registrar</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Editar Usuario" name="permissions[]"
                                                               value="Editar Usuario" {{ old('Editar Usuario') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Editar Usuario">Editar</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Eliminar Usuario" name="permissions[]"
                                                               value="Eliminar Usuario" {{ old('Eliminar Usuario') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Eliminar Usuario">Eliminar</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                  <!-- Roles Permission -->
                                <div class="mt-2 col-lg-4 col-md-6">
                                    <div class="card h-100 border-0 shadow">
                                        <div class="card-header">
                                            Roles
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="acceso_role" name="permissions[]"
                                                               value="acceso_role" {{ old('acceso_role') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="acceso_role">Acceso</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Ver Role" name="permissions[]"
                                                               value="Ver Role" {{ old('Ver Role') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Ver Role">Ver </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Registrar Role" name="permissions[]"
                                                               value="Registrar Role" {{ old('Registrar Role') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Registrar Role">Registrar </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Editar Role" name="permissions[]"
                                                               value="Editar Role" {{ old('Editar Role') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Editar Role">Editar </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Eliminar Role" name="permissions[]"
                                                               value="Eliminar Role" {{ old('Eliminar Role') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Eliminar Role">Eliminar </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- Permisos Permission -->
                                <div class="mt-2 col-lg-4 col-md-6">
                                    <div class="card h-100 border-0 shadow">
                                        <div class="card-header">
                                            Permisos
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="acceso_permisos" name="permissions[]"
                                                               value="acceso_permisos" {{ old('acceso_permisos') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="acceso_permisos">Acceso</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Ver Permisos" name="permissions[]"
                                                               value="Ver Permisos" {{ old('Ver Permisos') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Ver Permisos">Ver </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Registrar Permisos" name="permissions[]"
                                                               value="Registrar Permisos" {{ old('Registrar Permisos') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Registrar Permisos">Registrar </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Editar Permisos" name="permissions[]"
                                                               value="Editar Permisos" {{ old('Editar Permisos') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Editar Permisos">Editar </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Eliminar Permisos" name="permissions[]"
                                                               value="Eliminar Permisos" {{ old('Eliminar Permisos') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Eliminar Permisos">Eliminar </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <!-- Permisos Permission -->
                                <div class="mt-2 col-lg-4 col-md-6">
                                    <div class="card h-100 border-0 shadow">
                                        <div class="card-header">
                                            Ente
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="acceso_permisos" name="permissions[]"
                                                               value="acceso_empresa" {{ old('acceso_permisos') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="acceso_permisos">Acceso</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Ver Empresa" name="permissions[]"
                                                               value="Ver Empresa" {{ old('Ver Empresa') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Ver Empresa">Ver </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Registrar Empresa" name="permissions[]"
                                                               value="Registrar Empresa" {{ old('Registrar Empresa') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Registrar Empresa">Registrar </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Editar Empresa" name="permissions[]"
                                                               value="Editar Empresa" {{ old('Editar Empresa') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Editar Empresa">Editar </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Eliminar Empresa" name="permissions[]"
                                                               value="Eliminar Empresa" {{ old('Eliminar Empresa') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Eliminar Empresa">Eliminar </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- Permisos Permission -->
                                <div class="mt-2 col-lg-4 col-md-6">
                                    <div class="card h-100 border-0 shadow">
                                        <div class="card-header">
                                            Historial de sesión
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="acceso_logins" name="permissions[]"
                                                               value="acceso_logins" {{ old('acceso_logins') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="acceso_logins">Acceso</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Ver Logins" name="permissions[]"
                                                               value="Ver Logins" {{ old('Ver Logins') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Ver Logins">Ver</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <!-- Especialidades Permission -->
                                <div class="mt-2 col-lg-4 col-md-6">
                                    <div class="card h-100 border-0 shadow">
                                        <div class="card-header">
                                            Empleados
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="acceso_personal" name="permissions[]"
                                                               value="acceso_personal" {{ old('acceso_personal') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="acceso_personal">Acceso</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Ver Personal" name="permissions[]"
                                                               value="Ver Personal" {{ old('Ver Personal') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Ver Personal">Ver</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Registrar Personal" name="permissions[]"
                                                               value="Registrar Personal" {{ old('Registrar Personal') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Registrar Personal">Registrar</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Editar Personal" name="permissions[]"
                                                               value="Editar Personal" {{ old('Editar Personal') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Editar Personal">Editar</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="Eliminar Personal" name="permissions[]"
                                                               value="Eliminar Personal" {{ old('Eliminar Personal') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="Eliminar Personal">Eliminar</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                              <button type="submit" class="btn btn-primary float-left">Guardar datos <i class="bi bi-check"></i>
                        </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#select-all').click(function() {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function() {
                    this.checked = checked;
                });
            })
        });
    </script>
@endsection
