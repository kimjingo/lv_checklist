<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class ChecklistShow extends Component
{
    public $checklist;
    public $open_tasks = [];
    public $completed_tasks = [];

    public function mount()
    {
        // $this->open_tasks = [];
        $this->completed_tasks = Task::where('checklist_id', $this->checklist->id)
            ->where('user_id', auth()->id())
            ->whereNotNull('completed_at')
            ->pluck('id')
            ->toArray();
    }
    
    public function render()
    {
        return view('livewire.checklist-show');
    }

    public function toggle_task($task_id)
    {
        if(in_array($task_id, $this->open_tasks)){
            $this->open_tasks = array_diff($this->open_tasks, [$task_id]);
        } else {
            $this->open_tasks[] = $task_id;
        }
    }

    public function complete_task($task_id){
        $task = Task::find($task_id);
        if($task){
            $user_task = Task::where('task_id', $task_id)->first();
            if($user_task){
                if($user_task->completed_at){
                    $user_task->completed_at = NULL;
                } else {
                    $user_task->completed_at = now();
                }

            }else{
                $user_task = $task->replicate();
                $user_task['user_id'] = auth()->id();
                $user_task['task_id'] = $task_id;
                $user_task['completed_at'] = now();
                $user_task->save();
            }

            $this->emit('task_complete',
                $task_id,
                $task->checklist_id
            );
        }
    }
}