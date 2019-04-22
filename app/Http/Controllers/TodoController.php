<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Todo;

class TodoController extends Controller
{
    public function index(){        
        $todos = Todo::all();
        return view('todo.index',compact('todos'));
    }
}
