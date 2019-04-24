@extends('layouts.main')

@section('main_title')
    Todo Homepage
@endsection

@section('main_content')
<div class="container-fluid">

    <h1 class="font-weight-bold text-center mt-5 mb-5 text-light">Todo Lists</h1>

    <div class="row">
        <div class="col-md-4">        
        <h4 class="font-weight-bold text-center text-light mr-5 ">Add a todo list</h4>
            <form action="/posttodo" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row"> 
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="todo" placeholder="Enter todo list" required="required">
                    </div>
                    <div class="col-md-10 mt-3">
                        <button type="submit" class="btn btn-info ">Add to list</button>
                    </div>               
                </div>

                
                
                         
            </form>
        </div>
        
        <div class="col-md-7">
        <h3 class="col-sm-12 text-center">Todo List from database</h3>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">Tasks</th>
                    <th colspan="3">Actions</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($todos as $todo)   
                <tr>
                    <td scope="col">
                        <h5 class=" text-light">{{str_limit($todo->todo , $limit=40 , $end="...")}}</h5>
                    </td>
                    <td>
                        <a class="btn btn-light mr-5" href="/edittodo/{{$todo->id}}">Update</a>
                    </td>
                    <td> @if(!$todo->completed) 
                        <a href="/completedtodo/{{$todo->id}}"><i class="fas fa-clipboard-check fa-2x text-success"></i></a> 
                        @endif
                    </td>
                    <td>
                        <a href="/deletetodo/{{$todo->id}}" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt fa-2x text-danger"></i></a>     
                    </td>
                    <td>
                        @if($todo->completed)            
                        <a href="#"><i class="fas fa-check fa-2x text-success"></i></a>           
                        @else
                        <a href="#"><i class="fas fa-times fa-2x text-warning"></i></a>        
                        <br>
                        <hr>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        
            
            

    </div>
</div>

@endsection