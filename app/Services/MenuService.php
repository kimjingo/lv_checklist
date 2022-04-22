<?php

namespace App\Services;
use App\Models\Task;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Carbon\Carbon;

class MenuService{
    public function get_menu() : array
    {
        $menu = ChecklistGroup::with([
            'checklists' => function($query){
                $query->whereNull('user_id');
            },
            'checklists.tasks' => function($query){
                $query->whereNull('tasks.user_id');
            },
            'checklists.user_tasks'
        ])
        ->get();


        $groups = [];
        $last_action_at = auth()->user()->last_action_at;
        if($last_action_at) $last_action_at = now()->subYears(10);
        foreach($menu->toArray() as $group){
            if(count($group['checklists'])>0){
                $group['is_new'] = Carbon::parse($group['created_at'])->greaterThan($last_action_at);
                $group['is_updated'] = Carbon::parse($group['updated_at'])->greaterThan($last_action_at);
                foreach($group['checklists'] as &$checklist){
                    info($checklist['created_at']);
                    $checklist['is_new'] = !($group['is_new']) && Carbon::parse($checklist['created_at'])->greaterThan($last_action_at);//$last_action_at
                    $checklist['is_updated'] = !($group['is_updated']) && Carbon::parse($checklist['updated_at'])->greaterThan($last_action_at);
                    $checklist['tasks_count'] = $checklist['tasks'];
                    $checklist['completed_tasks_count'] = $checklist['user_tasks'];
                }
                $groups[] =$group;
            }
        }
        $user_tasks_menu = [];
        if(!auth()->user()->is_admin){
            $user_tasks = Task::where('user_id', auth()->id())->get();
            $user_tasks_menu = [
                'my_day' => [
                    'name' => __('My Day'),
                    'icon' => 'sun',
                    'tasks_count' => $user_tasks->whereNotNull('added_to_my_day_at')->count()
                ],
                'important' => [
                    'name' => __('Important'),
                    'icon' => 'star',
                    'tasks_count' => 0
                ],
                'planned' => [
                    'name' => __('Planned'),
                    'icon' => 'calendar',
                    'tasks_count' => 0
                ],
            ];
        }
        return [
            'admin_menu' => $menu,
            'user_menu' => $groups,
            'user_tasks_menu' => $user_tasks_menu,
        ];
    }
}