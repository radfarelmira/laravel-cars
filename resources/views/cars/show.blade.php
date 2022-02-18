@extends('layouts.app')

@section('main_content')
    <div class="card">
        <img src="{{ $car->img }}" class="card-img-top" alt="{{ $car->marca }}">
        <div class="card-body">
          <h5 class="card-title">{{ $car->marca }}</h5>
          <div>Modello: {{ $car->modello }}€</div>
          <div>Cilindrata {{ $car->cilindrata }}</div>
          <div>Porte: {{ $car->porte }}</div>
          <p class="card-text">{{ $car->description }}</p>
          <div><a class="btn btn-primary" href="{{ route('cars.edit', ['car' => $car->id]) }}">Modifica</a></div>
          <div>
            <form action="{{ route('cars.destroy', ['car' => $car->id]) }}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare?')">Cancella</button>
            </form>
          </div>
        </div>
    </div>
@endsection