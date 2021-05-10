@extends('layouts.app')

@section('content')
<div class="container">
    <div class="modal fade" id="itemInputModal" tabindex="-1" aria-labelledby="itemInputModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="itemInputModalLabel">Create TODO Item</h5>
              <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <form action="/items" method="post">
                @csrf
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="Item Name" name="item">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                  </div>
            </form>
          </div>
        </div>
      </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>TODO Items</span> 
                    <button class="btn btn-primary" data-toggle="modal" data-target="#itemInputModal">+</button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="list-group">
                    @foreach ($user->todoItem as $item)
                        <form action="/items/{{$item->id}}" method="post"class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        @csrf
                        @method('DELETE')
                        
                            <label for="item" class="m-0">{{$item->item}}</label>
                            <input id="item" class="d-none" type="text" name="item" value='{{$item}}'></input>
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    @endforeach
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
