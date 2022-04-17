<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Carbon\Carbon;

class MenuComposer
{
    public function compose(View $view)
    {
        $menu = \App\Models\ChecklistGroup::with([
            'checklists' => function($query){
                $query->whereNull('user_id');
            }
        ])
        ->get();
        $view->with('admin_menu', $menu);

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
                    $checklist['task'] = 1;
                    $checklist['completed_tasks'] = 0;
                }
                $groups[] =$group;
            }
        }
        $view->with('user_menu', $groups);
    }
}