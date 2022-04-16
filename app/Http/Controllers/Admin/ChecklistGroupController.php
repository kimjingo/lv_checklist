<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistGroupRequest;
use App\Http\Requests\UpdateChecklistGroupRequest;
use App\Models\ChecklistGroup;

class ChecklistGroupController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.checklist_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreChecklistGroupRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChecklistGroupRequest $request)
    {
        ChecklistGroup::create($request->validated());
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklist_groups.edit', compact('checklistGroup'));
    }

    public function update(UpdateChecklistGroupRequest $request, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->update($request->validated());
        return redirect()->route('home');
    }

    public function destroy(ChecklistGroup $checklistGroup)
    {
        $checklistGroup->delete();
        return redirect()->route('home');


    }
}
