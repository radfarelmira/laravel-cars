@extends('layouts.app')

@section('main_content')
    <section>
        <div class="container">
            <h2>Modifica macchine</h2>
            {{-- validation error control --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.cars.update', ['car' => $car->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="container">

                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" value="{{ old('marca') ? old('marca') : $car->marca }}">
                    </div>
      
                    <div class="mb-3">
                        <label for="modello" class="form-label">Modello</label>
                        <input modello="text" class="form-control" id="modello" name="modello" value="{{ old('modello') ? old('modello') : $car->modello }}">
                    </div>

                    {{-- categories --}}
                    <div class="mb-2">categoria</div>
                        <select class="form-select" id="category_id" name="category_id" >
    
                            <option value="">Nessuna</option>
                            {{-- ciao ragazzi, bisogna fare the bug per quanto riguarda la selected, perchè non funziona --}}
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{old('category_id') === $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
    
                        </select>
                    </div>
                    
                    {{-- cilindrata --}}
                    <div class="mb-3">
                        <label for="cilindrata" class="form-label">Cilindrata</label>
                        <input type="text" class="form-control" id="cilindrata" name="cilindrata" value="{{ old('cilindrata') ? old('cilindrata') : $car->cilindrata }}">
                    </div>
                    
                    {{-- porte --}}
                    <div class="mb-3">
                        <label for="porte" class="form-label">Porte</label>
                        <input type="text" class="form-control" id="porte" name="porte" value="{{ old('porte') ? old('porte') : $car->porte }}">
                    </div>
                    
                    {{-- immagine --}}
                    <div class="mb-3">
                        <label for="img" class="form-label">Url dell'immagine</label>
                        <input type="text" class="form-control" id="img" name="img" value="{{ old('img') ? old('img') : $car->img }}">
                        <img src="{{ $car->thumb }}" alt="">
                    </div>
    
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>
        </div>
    </section>
@endsection
