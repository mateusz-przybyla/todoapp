<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoAppController extends Controller
{
    public function index(){
        return view('todoapp.index');
    }
}
