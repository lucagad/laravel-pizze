@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$ingredient->name}}</h5>

              @if(count($ingredient->pizzas) != 0)
                <p class="card-text"> Lista Pizze: </p>
                <ul>
                  @foreach ( $ingredient->pizzas as $pizza )
                    <li class="card-text">{{$pizza->name}}</li>
                  @endforeach
                </ul>
              @endif

            
              <a href="{{route('admin.ingredients.edit', $ingredient)}}" class="btn btn-primary">Edit</a>
              <a href="{{route('admin.ingredients.index')}}" class="btn btn-primary">Lista</a>
            </div>
          </div>

    </div>
@endsection
