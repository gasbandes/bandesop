@extends('layouts.admin')
@section('content')
@section('breadcrumb')
 <h4 class="mb-0 font-size-18">Gerencias registradas</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home"></i> Home</a></li>
        <li class="breadcrumb-item active">Listado general</li>

    </ol>
@endsection
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('gerencias')
        </div>
    </div>
</div>
@endsection
