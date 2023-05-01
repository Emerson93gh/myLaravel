<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" id="sample_form" class="form-horizontal">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel">Add New Record</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <div class="form-group">
                    <label>Nombre del autor : </label>
                    <input type="text" name="nombre_autor" id="nombre_autor" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Fecha de nacimiento : </label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" />
                </div>
                {{-- <div class="form-group editpass">
                    <label>Password : </label>
                    <input type="password" name="password" id="password" class="form-control" />
                </div> --}}
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
