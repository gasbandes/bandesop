@extends('layouts.admin')
@section('title', 'CHAT')
@section('breadcrumb')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home"></i> Home</a></li>
        <li class="breadcrumb-item active">Listado general</li>

    </ol>
@endsection
@section('content')
    <div>
        <div class="row">
            <div class="col-sm-12">
               <livewire:chat.chat-form />
         </div>
        </div>
    </div>
@endsection


