@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$pizza->name}}</h5>
              <p class="card-text"> Prezzo: {{$pizza->price}}</p>
              <p class="card-text"> Popolarità: {{$pizza->popularity}}</p>
              <p class="card-text"> Ingredienti: </p>
              <ul>
                @foreach ( $pizza->ingredients as $ingredient )
                  <li class="card-text">{{$ingredient->name}}</li>
                @endforeach
              </ul>
              {{-- <p class="card-text"> Ingredienti: {{$ingredient->name}}</p> --}}

              <p class="card-text"> Vegana: {{$pizza->is_veggie ? 'Si': 'No'}}</p>
              <p class="card-text"> Descrizione: {{$pizza->description}}</p>
              <a href="{{route('admin.pizze.edit', $pizza)}}" class="btn btn-primary">Edit</a>
              <a href="{{route('admin.pizze.index')}}" class="btn btn-primary">Lista</a>
            </div>
          </div>

    </div>
@endsection
