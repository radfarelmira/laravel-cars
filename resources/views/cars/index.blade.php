@extends('layouts.app')

@section('main_content')
    <h1>Lista di macchine</h1>
    @foreach ($cars as $car)
        <div>
            <h2>
                <a href="{{ route('cars.show', ['car' => $car->id]) }}">{{ $car->marca }} {{ $car->modello }}</a>
            </h2>
        </div>
    @endforeach
@endsection