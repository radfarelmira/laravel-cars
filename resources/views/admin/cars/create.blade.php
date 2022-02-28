@extends('layouts.app')

@section('main_content')
    <div class="container">
        <h1>Inserisci Macchina</h1>

        <form action="{{ route('admin.cars.store') }}" method="post">
            @csrf
            @method('POST')

            <div class="mb-3">
              <label for="marca" class="form-label">Marca</label>
              <input type="text" class="form-control" id="marca" name="marca">
            </div>

            <div class="mb-3">
                <label for="modello" class="form-label">Modello</label>
                <input type="text" class="form-control" id="modello" name="modello">
            </div>

            <div class="mb-3">
                <label for="cilindrata" class="form-label">Cilindrata</label>
                <input type="text" class="form-control" id="cilindrata" name="cilindrata">
            </div>

            <div class="mb-3">
                <label for="porte" class="form-label">Porte</label>
                <input type="text" class="form-control" id="porte" name="porte">
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Url immagine</label>
                <input type="text" class="form-control" id="img" name="img">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection