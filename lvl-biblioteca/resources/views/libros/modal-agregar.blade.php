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
                    <label>Título del libro : </label>
                    <input type="text" name="titulo" id="titulo" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Autor del libro : </label>
                    {{-- <input type="text" name="autor" id="autor" class="form-control" /> --}}
                    <select name="autor_id" id="autor_id" class="form-control">
                        @foreach ($autores as $autor)
                            <option value="{{$autor->id}}">{{$autor->nombre_autor}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Ubicación del libro : </label>
                    <input type="text" name="ubicacion" id="ubicacion" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Cantidad de ejemplares : </label>
                    <input type="number" name="cantidad_ejemplares" id="cantidad_ejemplares" class="form-control" />
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
