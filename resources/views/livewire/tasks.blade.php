<div>
    <div class="container mt-5">
        @include('livewire.store')
        @include('livewire.logs')
        @if(session()->has('message'))
            <div class="alert alert-primary" role="alert">
                {{session('message')}}
            </div>
        @endif
        <table class="table table-striped">
            <thead class="text-center">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha Limite</th>
                <th scope="col">Creador</th>
                <th scope="col">Usuario Asignado</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr class="text-center">
                    <th scope="row">{{$task->id}}</th>
                    <td>{{$task->title}}</td>
                    <td>{{$task->description}}</td>
                    <td class="
                        @if($task->deadline < now())
                            text-red-500
                        @endif"
                        >
                        {{$task->deadline}}
                    </td>
                    <td>{{$task->creator->name}}</td>
                    <td>{{$task->user->name}}</td>
                    <td>
                        @if(auth()->user()->id == $task->user_id || auth()->user()->id == $task->creator_id ) 
                            <button data-toggle="modal" data-target="#storeModal" wire:click="edit({{ $task->id }})" class="btn btn-primary btn-sm">Editar</button>
                            <button wire:click="delete({{ $task->id }})" class="btn btn-danger btn-sm">Borrar</button>
                            <button data-toggle="modal" data-target="#logModal" wire:click="logsByTask({{ $task->id }})" class="btn btn-warning btn-sm">Logs</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
