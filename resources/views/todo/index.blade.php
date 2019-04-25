@extends('layouts.main')

@section('main_title')
    Todo Homepage
@endsection

@section('main_content')
<div class="container-fluid">

    <h1 class="font-weight-bold text-center mt-5 mb-5 text-light">Todo Lists</h1>

    <div class="row">
        <div class="col-4 mt-5"> 
        <div class="mt-5"></div>
        <div class="mt-5"></div>       
        <h4 class="font-weight-bold text-center text-light mr-5">Add a task</h4>
            <form action="{{ route('todo.create') }}" method="POST">
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
                        <th>Actions</th>                      
                        <th>Checkout</th>
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
                
                        <td>

                                <a class="btn btn-light" href="{{ route('todo.edit', $todo->id) }}">Update</a>

                        </td>

                        <td>

                            @if(!$todo->completed) 

                                <a href="{{ route('todo.complete', $todo->id) }}"><i class="fas fa-clipboard-check fa-2x text-success ml-3"></i></a> 

                            @else

                                Completed
                            
                            @endif
                       
                        </td>

                        <td>

                            <a href="#" data-toggle="modal" data-target="#deleteModal_{{$todo->id}}"><i class="far fa-trash-alt fa-2x text-danger mx-auto"></i></a>     

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
                        <td class="text-center">
                            <a class="btn btn-primary ml-auto">Previous</a>
                        </td>
                        <td colspan="2"></td>
                        <td class="text-center">
                            <a class="btn btn-primary mr-auto">Next</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="deleteModal_{{$id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Delete the given task from the database
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary text-light" href="{{ route('todo.delete', $id) }}">Yes</a>
        <a class="btn btn-secondary text-light" data-dismiss="modal">No</a>
      </div>
    </div>
  </div>
</div>

@endsection