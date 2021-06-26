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

        <H1>LISTADO | CONTACTOS</H1>

    </div>
    <div class="col-6">
        <a href="{{ route('contacto.create') }}"
            class="btn btn-primary align-items-center">Nuevo
            contacto</a>

    </div>
    <!-- para mostrar el mensaje de guardado de exito esto viene de controlador contacto store  -->
    @if(Session::has('mensaje'))
        <div class="alert alert-info" role="alert">
            {{ Session::get('mensaje') }}
        </div>
    @endif
</div>

<hr>
<div class="row align-items-start ">
    <div class="col">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>celular</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Comentario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @forelse($contactos as $contacto)
                        <td>{{ $contacto->nombre }}</td>
                        <td>{{ $contacto->apellido }}</td>
                        <td>{{ $contacto->celular }}</td>
                        <td>{{ $contacto->correo }}</td>
                        <td>{{ $contacto->direccion }}</td>
                        <td>{{ $contacto->comentario }}</td>
                        <td width="155"><a
                                href="{{ route('contacto.edit', $contacto) }}"
                                class="btn btn-warning">Editar</a>

                            <!-- se envia mediante un formulario por post  -->
                            <form method="post"
                                action="{{ route('contacto.destroy',$contacto) }}"
                                class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit"
                                    class="btn btn-danger d-inline"
                                    onclick="return confirm('¿Estás seguro de eliminar contacto?')">Eliminar</button>
                            </form>
                        </td>
                </tr>
            @empty
                <tr>
                    <!-- para mostrar cuando no hay registros  -->
                    <td colspan="7" class="text-center">No hay
                        registros de contactos | Pruebe
                        registrando uno</td>

                </tr>
                @endforelse

            </tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>celular</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Comentario</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection
