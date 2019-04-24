@extends('layouts.main')

@section('main_title')
    Todo Homepage
@endsection

@section('main_content')

<div class="mx-auto">
    <h1 class="col-md-12 font-weight-bold  mt-5 mb-5 text-light">Todo Lists</h1>
    <form action="/posttodo" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="form-group col-md-9">
                <input type="text" class="form-control" name="todo" placeholder="Enter todo list" required="required">
            </div>
            <div class="form-group col-md-3">
                <button type="submit" class="btn btn-info ">Add to list</button>
            </div>
        </div>
        
    </form>
    @foreach($todos as $todo)   
    <div class="row">
        <div class="col-md-7">
            <h5 class=" text-light">
            {{str_limit($todo->todo , $limit=40 , $end="...")}}
            <hr>
            </h5>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-3">
                    <a class="btn btn-light mr-5" href="/edittodo/{{$todo->id}}">Update</a>
                </div>
                <!-- <div class="col-md-3"></div> -->
                <div class="col-md-2 ml-5">
                    @if(!$todo->completed) 
                    <a href="/completedtodo/{{$todo->id}}"><i class="fas fa-clipboard-check fa-2x text-success"></i></a> 
                    @endif
                </div>
                
                <div class="col-md-2">
                    <a href="/deletetodo/{{$todo->id}}" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt fa-2x text-danger"></i></a>     
                </div>
                
                <div class="col-md-2">
                    @if($todo->completed)            
                    <a href="#"><i class="fas fa-check fa-2x text-success"></i></a>           
                    @else
                    <a href="#"><i class="fas fa-times fa-2x text-warning"></i></a>        
                    <br>
                    <hr>
                    @endif
                </div>
                   
            </div>       
        </div>
    </div>      
        
    @endforeach

</div>
@endsection