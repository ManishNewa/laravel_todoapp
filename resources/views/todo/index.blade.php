@extends('layouts.main')

@section('main_title')
    Todo Homepage
@endsection

@section('main_content')
<div class="container-fluid">

    <h1 class="font-weight-bold text-center mt-5 mb-5 text-light">Todo List Application</h1>

    <div class="row">
        <div class="col-4 mt-5"> 
        <div class="mt-5"></div>
        <div class="mt-5"></div>       
        <h4 class="font-weight-bold text-center text-light mr-5">Add a task</h4>
            <form action="/posttodo" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row"> 
                    <div class="col-10">
                        <input type="text" class="form-control" name="todo" placeholder="Enter todo list" required="required">
                    </div>
                    <div class="col-9 mt-3 ml-auto">
                        <button type="submit" class="btn btn-success">Add to list</button>
                    </div>               
                </div>
            </form>
        </div>
        
        <div class="col-7">
            <h3 class="col-sm-12 text-center text-light">Tasks Available </h3>
            <table class="table table-stripe table-dark">
                <thead>
                    <tr>
                        <th scope="col">Tasks</th>
                        <th class="text-center">Actions</th>
                        <th class="text-center">Delete</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($todos as $todo)   
                    <tr>
                        <td scope="col">
                            <h5 class=" text-light">{{str_limit($todo->todo , $limit=40 , $end="...")}}</h5>
                        </td>
                        <td class="row">

                            <div class="col-4">
                                <a class="btn btn-light" href="/edittodo/{{$todo->id}}">Update</a>
                            </div>   
                            <div class="col-2">
                                
                            </div>    
                            <div class="col-4">
                                @if(!$todo->completed) 
                                <a href="/completedtodo/{{$todo->id}}"><i class="fas fa-clipboard-check fa-2x text-success"></i></a> 
                                @endif
                            </div>   

                            
                           
                        </td>
                        <td>
                            <a href="/deletetodo/{{$todo->id}}" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt fa-2x text-danger ml-3"></i></a>     
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
                    <tr>
                        <td colspan="">
                            <span class="ml-auto">Previous</span>
                        </td>
                        <td></td>
                        <td>
                            <span class="mr-auto">Next</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection