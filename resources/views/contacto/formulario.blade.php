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
        <!-- verificamos si existe $contacto  -->
        @if(isset($contacto))
            <H1>EDITAR | CONTACTO</H1>
        @else
            <H1>NUEVO | CONTACTO</H1>
        @endif
    </div>
    <div class="col-6">
        <a href="{{ route('contacto.index') }}"
            class="btn btn-primary align-items-center">Cancelar</a>
    </div>
</div>
<hr>
<div class="row align-items-start">
    <div class="col-3">

    </div>
    <div class="col-6">
        <!-- verificamos si existe $contacto para editar o registrar -->
        @if(isset($contacto))
            <form method="post"
                action="{{ route('contacto.update',$contacto) }}">
                <!-- MODIFICADOR A PUT DE POST  -->
                @method('PUT')

            @else
                <form method="post"
                    action="{{ route('contacto.store') }}">
        @endif

        @csrf
        <div class="mb-1">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                placeholder="Ingrese nombre"
                value="{{ old('nombre') ?? @$contacto->nombre }}">
            @error('nombre')
                <p class="form-text text-danger">
                    {{ $message }}</p>
            @enderror
            <!-- <div id="nombre" class="form-text">Ingrese Nombre</div> -->
        </div>
        <div class="mb-1">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido"
                name="apellido" placeholder="Ingrese apellido"
                value="{{ old('apellido') ?? @$contacto->apellido }}">
            @error('apellido')
                <p class="form-text text-danger">
                    {{ $message }}</p>
            @enderror
            <!-- <div id="apellido" class="form-text">Ingrese apellido</div> -->
        </div>
        <div class="mb-1">
            <label for="celular" class="form-label">Celular</label>
            <input type="number" class="form-control" id="celular"
                placeholder="Ingrese celular" name="celular"
                value="{{ old('celular') ?? @$contacto->celular }}">
            @error('celular')
                <p class="form-text text-danger">
                    {{ $message }}</p>
            @enderror
            <!-- <div id="celular" class="form-text">Ingrese celular                </div> -->
        </div>
        <div class="mb-1">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo"
                placeholder="Ingrese correo" name="correo"
                value="{{ old('correo') ?? @$contacto->correo }}">
            @error('correo')
                <p class="form-text text-danger">
                    {{ $message }}</p>
            @enderror
            <!-- <div id="correo" class="form-text">Ingrese                     correo</div> -->
        </div>
        <div class="mb-1">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion"
                placeholder="Ingrese direccion" name="direccion"
                value="{{ old('direccion') ?? @$contacto->direccion }}">
            @error('direccion')
                <p class="form-text text-danger">
                    {{ $message }}</p>
            @enderror
            <!-- <div id="direccion" class="form-text">Ingrese dirección</div> -->
        </div>
        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <textarea class="form-control" id="comentario" name="comentario"
                placeholder="Ingrese comentario" col="30"
                row="5">{{ old('comentario') ?? @$contacto->comentario }}</textarea>
            @error('comentario')
                <p class="form-text text-danger">
                    {{ $message }}</p>
            @enderror
            <!-- <div id=" comentario" class="form-text">Ingrese comentario</div> -->
        </div>
        <!-- verificamos si existe $contacto  -->
        @if(isset($contacto))
            <button type="submit" class="btn btn-primary">Actualizar
                contacto</button>
        @else
            <button type="submit" class="btn btn-primary">Registrar
                contacto</button>
        @endif

        </form>
    </div>
    <div class="col-3">

    </div>
</div>
@endsection
