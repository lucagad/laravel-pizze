@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.pizze.update', $pizza)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" id="name" value="{{old('name', $pizza->name)}}" name="name" class="form-control @error('name') is-invalid @enderror"  >
              @error('name')
                  <p class="text-danger"> {{$message}} </p>
              @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prezzo</label>
                <input type="number" value="{{old('price', $pizza->price)}}" name="price" class="form-control  @error('price') is-invalid @enderror"  >
                @error('price')
                  <p class="text-danger"> {{$message}} </p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Popolarità</label>
                <input type="number" value="{{old('popularity', $pizza->popularity)}}" name="popularity" class="form-control  @error('popularity') is-invalid @enderror"  >
                @error('popularity')
                  <p class="text-danger"> {{$message}} </p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ingredienti</label>
                <input type="text" value="{{old('ingredients', $pizza->ingredients)}}" name="ingredients" class="form-control  @error('ingredients') is-invalid @enderror"  >
                @error('ingredients')
                  <p class="text-danger"> {{$message}} </p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Pizza vegana ?</label>
                <select value="{{old('is_veggie', $pizza->is_veggie)}}" name="is_veggie" id=""class="my-4  @error('is_veggie') is-invalid @enderror">
                    @error('is_veggie')
                        <p class="text-danger"> {{$message}} </p>
                    @enderror
                    <option
                    value="1"
                    >Si</option>
                    <option
                    value="0"
                    >No</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label "></label>
                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="" cols="30" rows="10">{{old('description', $pizza->description)}}</textarea>
                @error('description')
                  <p class="text-danger"> {{$message}} </p>
                @enderror
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
