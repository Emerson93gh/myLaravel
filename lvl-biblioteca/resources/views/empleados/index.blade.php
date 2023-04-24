@extends('empleados.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
    <h1 class="h1 text-primary fw-bold">Lista de Empleados</h1>
    <div class="table-responsive">
        <div class="card">
            <div class="card-body">
                <table id="empleados" class="table table-primary text-center justify-content-center">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($empleados as $empleado)
                            <tr class="">
                                <td>{{$empleado->id}}</td>
                                <td>{{$empleado->nombre}} </td>
                                <td>{{$empleado->correo}} </td>
                                <td>Editar - Eliminar</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span class="fw-bold">
                                    NO HAY REGISTROS!
                                </span> </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
    <script>
        $('#empleados').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endsection
