<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
class PageController extends Controller
{
    public function welcome()
    {
        $page = Page::findOrFail(1); // welcome page

        return view('page', compact('page'));
    }

    public function consultation()
    {
        $page = Page::findOrFail(2); // consultation page

        return view('page', compact('page'));
    }
    public function show(){
        return "Hi";
    }
}
