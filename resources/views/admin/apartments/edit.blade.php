@extends('layouts.create-edit')

@section('content')
    <h2>Edit</h2>
    <div id="app" class="container">
        <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- Titolo appartamento --}}
            <div class="form-group">
                <label for="title">Titolo appartamento</label>
                <input required type="text" class="form-control" name="title" id="title"
                    placeholder="Titolo dell'appartamento" value="{{ old('title', $apartment->title) }}" />
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- Prezzo --}}
            <div class="form-group">
                <label for="price">Prezzo dell'appartamento per notte</label>
                <input step="0.01" min="1" type="number" required name="price" id="price"
                    class="form-control" placeholder="Prezzo dell'appartamento per notte"
                    value="{{ old('price', $apartment->price) }}">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- Descrizione appartamento --}}
            <div class="form-group">
                <label for="description">Descrizione appartamento</label>
                <textarea required type="text" rows="5" class="form-control" name="description" id="description"
                    placeholder="Descrizione appartamento">{{ old('description', $apartment->description) }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- Indirizzo tramite Vue --}}
            <form-address data="{{ old('address', $apartment->address) }}"></form-address>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {{-- servizi --}}
            <div class="form-group">
                <label for="services">Servizi presenti:</label><br>
                @foreach ($services as $service)
                    <input @if (in_array($service->id, old('services', $apartment_services_id))) checked @endif class="ml-3" type="checkbox" name="services[]"
                        value="{{ $service->id }}" id="{{ $service }}">{{ $service->name }} <br>
                @endforeach
            </div>
            {{-- Immagine Copertina --}}
            <div class="form-group">
                <label for="cover_image">Immagine di copertina:</label>
                <input required type="file" name="cover_image" id="cover_image" class="form-control"
                    value="{{ old('cover_image', $apartment->cover_image) }}" />
                @error('cover_image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- N° MQ2 --}}
            <div class="form-group">
                <label for="mq2">Metri quadrati</label>
                <input required class="form-control" type="number" name="mq2" id="mq2" min="1"
                    value="{{ old('mq2', $apartment->mq2) }}" />
                @error('mq2')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- N° Stanze --}}
            <div class="form-group">
                <label for="rooms">N° di stanze</label>
                <input required class="form-control" type="number" name="rooms" id="rooms" min="1"
                    value="{{ old('rooms', $apartment->rooms) }}" />
                @error('rooms')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- N° letti --}}
            <div class="form-group">
                <label for="beds">N° di letti</label>
                <input required class="form-control" type="number" name="beds" id="beds" min="1"
                    value="{{ old('beds', $apartment->beds) }}" />
                @error('beds')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- N° bagni --}}
            <div class="form-group">
                <label for="bathrooms">N° di bagni</label>
                <input required class="form-control" type="number" name="bathrooms" id="bathrooms" min="1"
                    value="{{ old('bathrooms', $apartment->bathrooms) }}" />
                @error('bathrooms')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- Visibilità appartamento --}}
            <div class="form-group">
                <label for="is_visible">L'appartamento è visibile</label>
                <input type="radio" name="is_visible" id="is_visible" value="1"
                    @if ($apartment->is_visible) checked @endif /> SI

                <input type="radio" name="is_visible" id="is_visible" value="0"
                    @if (!$apartment->is_visible) checked @endif /> NO
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
