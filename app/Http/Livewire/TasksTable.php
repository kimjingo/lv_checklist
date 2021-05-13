<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class TasksTable extends Component
{
    public $checklist;
    public function render()
    {
        $tasks = $this->checklist->tasks()->orderBy('position')->get();
        // sortBy : collection
        // orderBy : eloquetn
        return view('livewire.tasks-table', compact(['tasks']));
        // return view('livewire.tasks-table');
    }

    public function updateTaskOrder($tasks)
    {
        // dd($tasks);
        foreach($tasks as $task){
            Task::find($task['value'])->update(['position' => $task['order']]);
        }
    }
}
