@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.ingredients.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" id="name" value="{{old('name')}}" name="name" class="form-control @error('name') is-invalid @enderror"  >
              @error('name')
                  <p class="text-danger"> {{$message}} </p>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
