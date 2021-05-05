@extends('layouts.app')

@section('content')
<div class="container">
    {{-- create todo item modal --}}
    <form action='todoItems/create' method="post">
      @csrf
      <div type="button" class="modal fade" id="todoInputModal" tabindex="-1" aria-labelledby="todoInputModal" ari-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create TODO Item</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Todo Item" name="item" aria-label="Username">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>

      {{-- list of todo items --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{"TODO ITEMS"}}</span>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#todoInputModal">+</button>
                </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="list-group list-group-flush">
                      @foreach (auth()->user()->todoItem as $todoItem)
                        <div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                          <span>{{$todoItem["todoItem"]}}</span>
                          <form action="/todoItems/{{ $todoItem['id'] }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">complete</button>
                          </form>
                        </div>
                        
                      @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
