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

    public function store(Request $request){

        $todo = new Todo;
        $todo->todo = $request['todo'];

        $notification = array(

            'message' => 'New todo list added successfully',
            'alert-type' =>'success'

        );
        $todo->save();

        return redirect('/')->with($notification);

    }

    public function edit($id){

        $todo = Todo::findOrFail($id)->first();

        return view('todo.edit',compact('todo'));

    }
    
    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id)->first();
        
        $todo->todo =   $request->todo; 
        $todo->completed = 0;
        $todo->save();
        
        $notification = array(

            'message' => 'Todo list updated',
            'alert-type' =>'info'

        );

        return redirect('/')->with($notification);
        
    }

    public function destroy($id){

        Todo::findOrFail($id)->delete();
        
        $notification = array(

            'message' => 'Todo list removed',
            'alert-type' =>'warning'

        );
        return redirect('/')->with($notification);

    }

    public function completedTodo($id){

        $todo = Todo::findOrFail($id);        
       
        $todo->completed = 1;

        
        $notification = array(

            'message' => 'Todo list completed',
            'alert-type' =>'success'

        );

        $todo->save();

        return redirect('/')->with($notification);

    }

}
