@extends('layouts.app')

@section('main_content')
    <div class="card">
        <img src="{{ $car->img }}" class="card-img-top" alt="{{ $car->marca }}">
        <div class="card-body">
          <h5 class="card-title cyan">{{ $car->marca }}</h5>
          <div class="cyan">Modello: {{ $car->modello }}€</div>
          <div class="cyan">Cilindrata {{ $car->cilindrata }}</div>
          <div class="cyan">Porte: {{ $car->porte }}</div>
          <p class="card-text">{{ $car->description }}</p>
          <div class="cyan"><a class="btn btn-primary" href="{{ route('admin.cars.edit', ['car' => $car->id]) }}">Modifica</a></div>
          <div class="cyan">
            <form class="cyan" action="{{ route('admin.cars.destroy', ['car' => $car->id]) }}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare?')">Cancella</button>
            </form>
          </div>
        </div>
    </div>
@endsection