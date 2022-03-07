@extends('plantillas.plantilla')

@section('title')
    Alumnos
@endsection

@section('contenido')
    <h1>Alumnos</h1>
    <table class="table table-hover">
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Nota</th>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno )
            <tr>
                <td><?=$alumno->getNombre()?></td>
                <td><?=$alumno->getApellidos()?></td>
                <td><?=$alumno->getEdad()?></td>
                <td><?=$alumno->getNota()?></td>
            </tr>

            @endforeach
        </tbody>
    </table>
@endsection
