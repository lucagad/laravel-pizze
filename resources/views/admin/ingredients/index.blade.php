@extends('layouts.app')

@section('content')
<div class="container">
        @if(session('cancellato'))
            <div class=" my-2 alert alert-success" role="alert">
                {{ session('cancellato') }}
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-between my-5">
            <h1>Lista Ingredienti</h1>
            <a href="{{ route('admin.ingredients.create')}}" class="btn btn-success">Crea</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Azioni</th>

            </tr>
            </thead>
            <tbody>
                @foreach ($ingredients as $ingredient)
                    <tr>
                        <th scope="row">{{ $ingredient->id }}</th>
                        <td>{{ $ingredient->name }}</td>
                        <td>
                            <a href="{{route('admin.ingredients.show', $ingredient)}}" class="btn btn-primary">
                                Show
                            </a>
                            <a href="{{route('admin.ingredients.edit', $ingredient)}}" class="btn btn-secondary">
                                Edit
                            </a>
                            <form action="{{ route('admin.ingredients.destroy', $ingredient) }}" 
                            method="POST" 
                            class="d-inline"
                            onsubmit=" return confirm('Sei sicuro di voler eliminare l\'ingrediente: {{ $ingredient->name}} ?')">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row justify-content-center text-center">
            <div class="col-2">
                {{ $ingredients->links() }}
            </div>
        </div>
    </div>
@endsection
