@extends('layouts.create-edit')

@section('content')
    <h2>Create</h2>
    <div id="app" class="container">
        <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Titolo appartamento --}}
            <div class="form-group">
                <label for="title">Titolo appartamento</label>
                <input type="text" class="form-control" name="title" id="title"
                    placeholder="Titolo dell'appartamento" />
            </div>
            {{-- Descrizione appartamento --}}
            <div class="form-group">
                <label for="description">Descrizione appartamento</label>
                <textarea type="text" rows="5" class="form-control" name="description" id="description"
                    placeholder="Descrizione appartamento"></textarea>
            </div>
            {{-- Indirizzo tramite Vue --}}
            <form-address></form-address>
            <div class="form-group">
                <label for="services">Servizi presenti:</label><br>
                @foreach ($services as $service)
                    <input class="ml-3" type="checkbox" name="services[]" value="{{ $service->id }}"
                        id="{{ $service }}">{{ $service->name }} <br>
                @endforeach
            </div>
            {{-- Immagine Copertina --}}
            <div class="form-group">
                <label for="cover_image">Immagine di copertina:</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control" />
            </div>
            {{-- N° MQ2 --}}
            <div class="form-group">
                <label for="mq2">Metri quadrati</label>
                <input class="form-control" type="number" name="mq2" id="mq2" min="0" />
            </div>
            {{-- N° Stanze --}}
            <div class="form-group">
                <label for="rooms">N° di stanze</label>
                <input class="form-control" type="number" name="rooms" id="rooms" min="0" />
            </div>
            {{-- N° letti --}}
            <div class="form-group">
                <label for="beds">N° di letti</label>
                <input class="form-control" type="number" name="beds" id="beds" min="0" />
            </div>
            {{-- N° bagni --}}
            <div class="form-group">
                <label for="bathrooms">N° di bagni</label>
                <input class="form-control" type="number" name="bathrooms" id="bathrooms" min="0" />
            </div>
            {{-- Visibilità appartamento --}}
            <div class="form-group">
                <label for="is_visible">L'appartamento è visibile</label>
                <input type="radio" name="is_visible" id="is_visible" value="1" /> SI
                <input type="radio" name="is_visible" id="is_visible" value="0" /> NO
            </div>
            {{-- Submit --}}
            <button type="submit" class="btn btn-success">Invia</button>
        </form>
    </div>
    <script defer src="{{ asset('js/formCreate.js') }}"></script>
@endsection
