@extends('theme.app')
@section('content')
    <x-datatable>
        <div class="row">
            <div class="col-12 table-responsive">
                <br />
                <h3 align="center" class="text-success fw-bold">
                    Catálogo de libros
                </h3>
                <br />
                <div align="right">
                    <button type="button" name="create_record" id="create_record" class="btn btn-success">
                        <i class="bi bi-plus-square"></i>
                        Agregar Libro
                    </button>
                </div>
                <br />
                <div class="card">
                    <div class="card-body">
                        <table id="libros_datatable" class="table table-success table-striped table-bordered text-center jusify-content-center">
                            <thead>
                                <tr>
                                    <th class="text-center"># ID</th>
                                    <th class="text-center">Título del libro</th>
                                    <th class="text-center">Autor</th>
                                    <th class="text-center">Ubicación</th>
                                    <th class="text-center">Cantidad de ejemplares</th>
                                    <th class="text-center">Cantidad disponibles</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @section('js')
        <script type="text/javascript">
            $(document).ready(function() {
                    $('#libros_datatable').DataTable({
                        responsive: true,
                        autoWidth: false,
                        processing: true,
                        serverSide: true,
                        "language": {
                            "lengthMenu": "Mostrar "
                                                + `
                                                <select class="form-select custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                    <option value="-1">All</option>
                                                </select>
                                                ` +
                                            " registros por página",
                            "zeroRecords": "No se ha encontrado - disculpe",
                            "info": "Mostrando la página _PAGE_ de _PAGES_",
                            "infoEmpty": "No hay registros disponibles",
                            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                            "search": "Buscar:",
                            "paginate": {
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        },
                        ajax: "{{ route('libros.index') }}",
                        dataType: 'json',
                        type: 'POST',
                        columns: [
                            {data: 'id', name: 'id'},
                            {data: 'titulo', name: 'titulo'},
                            {data: 'autor.nombre_autor', name: 'autor.nombre_autor'},
                            {data: 'ubicacion', name: 'ubicacion'},
                            {data: 'cantidad_ejemplares', name: 'cantidad_ejemplares'},
                            {data: 'cantidad_disponibles', name: 'cantidad_disponibles'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ],
                    });

                    $('#create_record').click(function(){
                    $('.modal-title').text('Agregar nuevo libro');
                    $('#action_button').val('Guardar');
                    $('#action').val('Add');
                    $('#form_result').html('');

                    $('#formModal').modal('show');

                    });

                    $('#sample_form').on('submit', function(event){
                        event.preventDefault();
                        var action_url = '';

                    if($('#action').val() == 'Add')
                    {
                        action_url = "{{ route('libros.store') }}";
                    }
                    if($('#action').val() == 'Edit')
                    {
                        action_url = "{{ route('libros.update') }}";
                    }


                    $.ajax({
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: action_url,
                    data:$(this).serialize(),
                    dataType: 'json',
                    success: function(data) {
                        console.log('success: '+data);
                        var html = '';
                        if(data.errors)
                        {
                            html = '<div class="alert alert-danger">';
                            for(var count = 0; count < data.errors.length; count++)
                            {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if(data.success)
                        {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();
                            $('#libros_datatable').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    },
                    error: function(data) {
                        var errors = data.responseJSON;
                        console.log(errors);
                    }

                    });
                    });

                    $(document).on('click', '.edit', function(event){
                    event.preventDefault();
                    var id = $(this).attr('id');
                    //alert(id);
                    $('#form_result').html('');

                    $.ajax({
                    url :"/libros/edit/"+id+"/",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType:"json",
                    success:function(data)
                    {
                        console.log('success: '+data);
                        $('#titulo').val(data.result.titulo);
                        $('#autor_id').val(data.result.autor_id);
                        $('#ubicacion').val(data.result.ubicacion);
                        $('#cantidad_ejemplares').val(data.result.cantidad_ejemplares);
                        $('#hidden_id').val(id);
                        $('.modal-title').text('Editar el libro');
                        $('#action_button').val('Actualizar');
                        $('#action').val('Edit');
                        $('.editpass').hide();
                        $('#formModal').modal('show');
                    },
                    error: function(data) {
                        var errors = data.responseJSON;
                        console.log(errors);
                    }

                    });
                    });

                    var libro_id;
                    $(document).on('click', '.delete', function(){
                        libro_id = $(this).attr('id');
                        $('#confirmModal').modal('show');
                    });

                    $('#ok_button').click(function(){
                        $.ajax({
                            url:"/libros/destroy/"+libro_id+"/",
                            beforeSend:function(){
                                $('#ok_button').text('Eliminando...');
                            },
                            success:function(data)
                            {
                                setTimeout(function(){
                                $('#confirmModal').modal('hide');
                                $('#libros_datatable').DataTable().ajax.reload();
                                alert('Libro eliminado!');
                                }, 2000);
                            }
                        });
                    });

                    // TEST - Ver prestamos del libro
                    $(document).on('click', '.prestamo', function(event){
                    event.preventDefault();
                    var id = $(this).attr('id');
                    alert(id);
                    //$('#form_result').html('');

                    // $.get(" {{ route('prestamos.index') }} ", {id: id}, function(response){
                    //     $('#modalIndex').html(response);
                    // });

                    // $.ajax({
                    // url :" {{ route('prestamos.index')}} ",
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    // dataType:"json",
                    // success:function(data)
                    // {
                    //     console.log('success: '+data);
                    // },
                    // error: function(data) {
                    //     var errors = data.responseJSON;
                    //     console.log(errors);
                    // }

                    // });
                    });
            });
        </script>
    @endsection
    </x-datatable>
@endsection

@section('modal')
    <!-- Seccion modal agregar/editar libro -->
    @include('libros.modal-agregar')
    <!-- Seccion modal eliminar libro -->
    @include('theme.modal-confirmar')
    <!-- Seccion modal prestamo de libro -->
@endsection
