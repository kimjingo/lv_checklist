<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checklist;
use App\Services\ChecklistService;

class ChecklistController extends Controller
{
    public function show(Checklist $checklist){
        // sync checlist from admin
        (new ChecklistService())->sync_checklist($checklist, auth()->user()->id);
        return view('user.checklists.show', compact('checklist'));
    }
}
