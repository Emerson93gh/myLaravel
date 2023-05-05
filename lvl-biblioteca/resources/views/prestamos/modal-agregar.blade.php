<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" id="sample_form" class="form-horizontal">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold text-success" id="ModalLabel">Add New Record</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <div class="form-group">
                    <label class="fst-italic fw-semibold">Nombre del lector : </label>
                    <input type="text" name="nombre_persona" id="nombre_persona" class="form-control" />
                </div>
                <div class="form-group">
                    <label class="fst-italic fw-semibold">Título del libro : </label>
                    <select name="libro_id" id="libro_id" class="form-control">
                        @foreach ($libros as $libro)
                            <option value="{{$libro->id}}">{{$libro->titulo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="fst-italic fw-semibold">Fecha de préstamo : </label>
                    <input type="date" name="fecha_prestamo" id="fecha_prestamo" class="form-control" />
                </div>
                <div class="form-group">
                    <label class="fst-italic fw-semibold">Fecha de devolución : </label>
                    <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="form-control" />
                </div>

                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <input type="submit" name="action_button" id="action_button" value="Add" class="btn btn-success" />
        </form>
            </div>
      </div>
    </div>
</div>
