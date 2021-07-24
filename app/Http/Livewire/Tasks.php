<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use App\Models\Log;


class Tasks extends Component
{
    public $tasks, $users, $logs = [], $task_id, $creator_id, $title, $description, $deadline, $user_id, $comment;

    public function render()
    {
        $this->tasks = Task::all();
        $this->getUsers();
        return view('livewire.tasks');
    }

    public function getUsers()
    {
        $this->users = User::all();
    }

    public function logsByTask($id)
    {
        $this->logs = Task::findOrFail($id)->logs;
        $this->task_id = $id;
    }

    public function clear()
    {
        $this->title = "";
        $this->description = "";
        $this->deadline = "";
        $this->user_id = "";
        $this->comment = "";
        $this->task_id = "";
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->task_id = $task->id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->deadline = $task->deadline;
        $this->user_id = $task->user_id;
    }

    public function store()
    {
        $validations = $this->validate([
            'title'       => 'required|string|max:50',
            'description' => 'required|string',
            'deadline'    => 'required|date|after:yesterday',
            'user_id'     => 'required|integer'
        ]);

        Task::updateOrCreate(
            ['id' => $this->task_id],
            [
                'title'       => $this->title,
                'description' => $this->description,
                'deadline'    => $this->deadline,
                'user_id'     => $this->user_id,
                'creator_id'  => auth()->user()->id
            ]   
        );

        $this->emit('taskStored');
        session()->flash('message', $this->task_id ? 'Tarea actualizada correctamente' : 'Tarea guardada correctamente');
        $this->clear();        
    }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();
        session()->flash('message', 'Tarea eliminada correctamente');
    }

    public function addComment()
    {
        $validations = $this->validate([
            'comment' => 'required|string|max:250',
        ]);

        Log::create(
            [
                'comment'   =>  $this->comment,
                'task_id'   =>  $this->task_id,
                'user_id'   =>  auth()->user()->id
            ]
        );
        session()->flash('message', 'Comentario añadido correctamente');
        $this->clear(); 
    }
}
