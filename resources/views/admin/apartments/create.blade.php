@extends('layouts.create-edit')

@section('content')
    <h2>Create</h2>
    <div id="app" class="container">
        <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Titolo appartamento --}}

            <div class="form-group">
                <label for="title">Titolo appartamento</label>
                <input required type="text" class="form-control" name="title" id="title"
                    placeholder="Titolo dell'appartamento" />
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- Descrizione appartamento --}}
            <div class="form-group">
                <label for="description">Descrizione appartamento</label>
                <textarea required type="text" rows="5" class="form-control" name="description" id="description"
                    placeholder="Descrizione appartamento"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- Indirizzo tramite Vue --}}
            <form-address></form-address>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            {{-- SERVIZI --}}
            <div class="form-group">
                <label for="services">Servizi presenti:</label><br>
                @foreach ($services as $service)
                    <input required class="ml-3" type="checkbox" name="services[]" value="{{ $service->id }}"
                        id="{{ $service }}">{{ $service->name }} <br>
                @endforeach
            </div>
            {{-- Immagine Copertina --}}
            <div class="form-group">
                <label for="cover_image">Immagine di copertina:</label>
                <input required  type="file" name="cover_image" id="cover_image" class="form-control" />
                @error('cover_image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- N° MQ2 --}}
            <div class="form-group">
                <label for="mq2">Metri quadrati</label>
                <input required class="form-control" type="number" name="mq2" id="mq2" min="0" />
                @error('mq2')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- N° Stanze --}}
            <div class="form-group">
                <label for="rooms">N° di stanze</label>
                <input required class="form-control" type="number" name="rooms" id="rooms" min="0" />
                @error('rooms')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- N° letti --}}
            <div class="form-group">
                <label for="beds">N° di letti</label>
                <input required class="form-control" type="number" name="beds" id="beds" min="0" />
                @error('beds')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- N° bagni --}}
            <div class="form-group">
                <label for="bathrooms">N° di bagni</label>
                <input required class="form-control" type="number" name="bathrooms" id="bathrooms" min="0" />
                @error('bathrooms')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- Visibilità appartamento --}}
            <div class="form-group">
                <label for="is_visible">L'appartamento è visibile</label>
                <input type="radio" name="is_visible" id="is_visible" value="1" /> SI
                <input type="radio" name="is_visible" id="is_visible" value="0" /> NO

                @error('is_visible')
                    <br>
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- Submit --}}
            <button type="submit" class="btn btn-success">Invia</button>
        </form>
    </div>
    <script defer src="{{ asset('js/formCreate.js') }}"></script>
@endsection
