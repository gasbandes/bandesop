@extends('layouts.admin')
@section('breadcrumb')
 <h4 class="mb-0 font-size-18">Productos registrados</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home"></i> Home</a></li>
        <li class="breadcrumb-item active">Listado general</li>

    </ol>
@endsection
@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('productos')
        </div>
    </div>
</div>
@endsection
