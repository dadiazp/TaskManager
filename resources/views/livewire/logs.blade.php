<!-- Modal -->
<div wire:ignore.self class="modal fade" id="logModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @foreach($logs as $log)
                        <div class="border border-light rounded mb-5 p-2">
                            <span>{{$log->user->name}} | {{$log->created_at}}</span>
                            <hr>
                            <p>{{$log->comment}}</p>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label for="title">Comentario</label>
                        <textarea class="form-control" wire:model="comment" id="log" placeholder="Ingrese un comentario" wire:model="comment"></textarea>
                        @error('comment') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="clear()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="addComment()" class="btn btn-primary" data-dismiss="modal">Añadir comentario</button>
            </div>
       </div>
    </div>
</div>
