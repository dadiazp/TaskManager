<button type="button" class="btn btn-success mb-5" data-toggle="modal" data-target="#storeModal">
	Crear nueva tarea
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn" wire:click="clear()">×</span>
                </button>
            </div>
        <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" id="title" placeholder="Ingrese un titulo" wire:model="title">
                        @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <input type="text" class="form-control" id="description" wire:model="description" placeholder="Ingrese descripcion">
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="deadline">Fecha limite</label>
                        <input type="date" class="form-control" id="deadline" wire:model="deadline" placeholder="Ingrese fecha maxima">
                        @error('deadline') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="users">Usuarios</label>
                        </div>
                        <select class="custom-select form-control" id="userSelect"  wire:model="user_id">
                            <option selected>Choose...</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="clear()" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
