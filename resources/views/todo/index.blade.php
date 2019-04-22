@extends('layouts.main')

@section('main_title')
    Todo Homepage
@endsection

@section('main_content')


<div class=" mx-auto">
    <h1 class="col-md-12 font-weight-bold text-center mt-5 mb-5">Todo Lists</h1>
    <form action="/posttodo" method="POST">
        <div class="row">
            <div class="form-group col-md-9">
                <input type="text" class="form-control" placeholder="Enter todo list">
            </div>
            <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">Add to list</button>
            </div>
        </div>
        
    </form>

        <table class="table table-bordered table-dark">
            <tbody>
                @foreach($todos as $todo)
                <tr>
                    <td scope="col" class="text-light"><h5>{{$todo->todo}}</h5></td>

                    <td><a class="btn btn-warning" href="">Update</a></td>
                   
                    @if($todo->completed)
                    <td><a href="#"><i class="fas fa-check fa-2x text-success"></i></a></td>
                    
                    @else
                    <td><a href="#"><i class="fas fa-times fa-2x text-warning"></i></a></td>
                
                    @endif
                    
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection