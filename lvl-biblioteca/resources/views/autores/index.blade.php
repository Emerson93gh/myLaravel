@extends('theme.app')
@section('content')
    <x-datatable>
        <div class="row">
            <div class="col-12 table-responsive">
                <br />
                <h3 align="center" class="text-success fw-bold">
                    Lista de Autores
                </h3>
                <br />
                <div align="right">
                    <button type="button" name="create_record" id="create_record" class="btn btn-success">
                        <i class="bi bi-plus-square"></i>
                        Agregar Autor
                    </button>
                </div>
                <br />
                <div class="card">
                    <div class="card-body">
                        <table id="autores_datatable" class="table table-striped table-bordered text-center jusify-content-center">
                            <thead>
                                <tr>
                                    <th># ID</th>
                                    <th>Nombre del Autor</th>
                                    <th>Fecha de nacimiento</th>
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
            {{-- <script src=" {{ asset('js/autores.js') }} " type="text/javascript"></script> --}}
            {{-- <script type="text/javascript">
                $.ajax({
                method: "GET",
                url: "js/autores.js",
                dataType: "script"
                });
            </script> --}}

            <script type="text/javascript">
                $(document).ready(function() {
                    var table = $('#autores_datatable').DataTable({
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
                        ajax: "{{ route('autores.index') }}",
                        columns: [
                            {data: 'id', name: 'id'},
                            {data: 'nombre_autor', name: 'nombre_autor'},
                            {data: 'fecha_nacimiento', name: 'fecha_nacimiento'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ],
                    });

                    $('#create_record').click(function(){
                    $('.modal-title').text('Agregar nuevo autor');
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
                        action_url = "{{ route('autores.store') }}";
                    }
                    if($('#action').val() == 'Edit')
                    {
                        action_url = "{{ route('autores.update') }}";
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
                            $('#autores_datatable').DataTable().ajax.reload();
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
                    url :"/autores/edit/"+id+"/",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType:"json",
                    success:function(data)
                    {
                        console.log('success: '+data);
                        $('#nombre_autor').val(data.result.nombre_autor);
                        $('#fecha_nacimiento').val(data.result.fecha_nacimiento);
                        $('#hidden_id').val(id);
                        $('.modal-title').text('Editar el autor');
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

                    var autor_id;
                    $(document).on('click', '.delete', function(){
                        autor_id = $(this).attr('id');
                        $('#confirmModal').modal('show');
                    });

                    $('#ok_button').click(function(){
                        $.ajax({
                            url:"/autores/destroy/"+autor_id+"/",
                            beforeSend:function(){
                                $('#ok_button').text('Eliminando...');
                            },
                            success:function(data)
                            {
                                setTimeout(function(){
                                $('#confirmModal').modal('hide');
                                $('#autores_datatable').DataTable().ajax.reload();
                                alert('¡Autor eliminado!');
                                }, 2000);
                            }
                        });
                    });

                });
            </script>

        @endsection
    </x-datatable>
@endsection



 @section('modal')
    <!-- Seccion modal agregar/editar autor -->
    @include('autores.modal-agregar')
    <!-- Seccion modal eliminar autor -->
    @include('theme.modal-confirmar')
@endsection

