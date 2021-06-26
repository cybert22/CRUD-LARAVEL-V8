@extends('thema.plantilla')
@section('contenido')

<div class="row align-items-start text-center bg-warning my-2">
    <div class="col py-1">
        <h4>Introducción a laravel v8 - Contactos </h4>
    </div>
</div>
<hr>
<div class="row align-items-start text-center ">
    <div class="col-6">

        <H1>CRUD | CONTACTOS</H1>

    </div>
    <div class="col-6">
        <a href="{{ route('contacto.index') }}"
            class="btn btn-primary align-items-center">Administración
            contactos</a>
    </div>
</div>
<hr>

@endsection
