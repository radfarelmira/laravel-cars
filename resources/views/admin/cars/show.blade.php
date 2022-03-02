@extends('layouts.app')

@section('main_content')
    <div class="card">

      <img src="{{ $car->img }}" class="card-img-top" alt="{{ $car->marca }}">

      <div class="card-body">

        {{-- marca --}}
        <h5 class="card-title cyan">{{ $car->marca }}</h5>

        {{-- categories --}}
        <div> categorie: {{$car->category ? $car->category->name : 'nessuno'}} </div>

        {{-- modello --}}
        <div class="cyan">Modello: {{ $car->modello }}€</div>

        {{-- cilindrata --}}
        <div class="cyan">Cilindrata {{ $car->cilindrata }}</div>

        {{-- porte --}}
        <div class="cyan">Porte: {{ $car->porte }}</div>

        {{-- descrizione --}}
        <p class="card-text">{{ $car->description }}</p>

        {{-- button --}}
        <div class="cyan"><a class="btn btn-primary" href="{{ route('admin.cars.edit', ['car' => $car->id]) }}">Modifica</a></div>

        {{-- FORM DELETE - BUTTON --}}
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