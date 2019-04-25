@extends('layouts.main')

@section('main_title')
    Todo Homepage
@endsection

@section('main_content')

<div class="mx-auto">
    <h1 class="col-md-12 font-weight-bold  text-light text-center mt-5 mb-5">Update Todo </h1>
    <form action="{{ route('todo.update', $todo->id) }}" method="get">
        <div class="row">
            <div class="form-group col-md-12 text-center">
                <textarea name="todo" cols="70" rows="4">{{$todo->todo}}</textarea>
            </div>
            <div class="form-group text-center col-md-12">
                <button type="submit" class="btn btn-info ">Update Todo list</button>
            </div>
        </div>
        
    </form>

        
    </div>
@endsection