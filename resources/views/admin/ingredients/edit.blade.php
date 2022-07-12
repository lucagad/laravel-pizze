@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.ingredients.update', $ingredient)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" id="name" value="{{old('name', $ingredient->name)}}" name="name" class="form-control @error('name') is-invalid @enderror"  >
              @error('name')
                  <p class="text-danger"> {{$message}} </p>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
