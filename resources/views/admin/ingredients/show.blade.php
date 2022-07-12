@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$ingredient->name}}</h5>
            
              <a href="{{route('admin.ingredients.edit', $ingredient)}}" class="btn btn-primary">Edit</a>
              <a href="{{route('admin.ingredients.index')}}" class="btn btn-primary">Lista</a>
            </div>
          </div>

    </div>
@endsection
