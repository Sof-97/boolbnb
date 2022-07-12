@extends('layouts.create-edit')

@section('content')

@include('layouts.nav-title')
<div class="flex-center">
    <h3 class="pill">Aggiungi un appartamento</h3>
</div>

<div id="app" class="flex-center">
    <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Titolo appartamento --}}
        <div class="flex wrap justify-center">
            <div class="form-group">
                <input onclick="myFunction()" required type="text" class="form-control form-create" name="title" id="title"
                    placeholder="Titolo dell'appartamento" />
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- Prezzo --}}
            <div class="form-group">
                <input onclick="myFunction()" step="0.01" min="1" type="number" required name="price" id="price"
                    class="form-control form-create" placeholder="Prezzo dell'appartamento per notte">
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        {{-- Descrizione appartamento --}}
        <div class="form-group">
            <label for="description">Descrizione appartamento</label>
            <textarea onclick="myFunction()" required type="text" rows="5" class="form-control" name="description" id="description"
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
            <input class="ml-3" type="checkbox" name="services[]" value="{{ $service->id }}"
                id="{{ $service }}">{{ $service->name }} <br>
            @endforeach
        </div>
        {{-- Immagine Copertina --}}
        <div class="form-group">
            <label for="cover_image">Immagine di copertina:</label>
            <input required type="file" name="cover_image" id="cover_image" class="form-control" />
            @error('cover_image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- N° MQ2 --}}
        <div class="form-group">
            <label for="mq2">Metri quadrati</label>
            <input onclick="myFunction()" required class="form-control" type="number" name="mq2" id="mq2" min="1" />
            @error('mq2')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- N° Stanze --}}
        <div class="form-group">
            <label for="rooms">N° di stanze</label>
            <input onclick="myFunction()" required class="form-control" type="number" name="rooms" id="rooms" min="1" />
            @error('rooms')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- N° letti --}}
        <div class="form-group">
            <label for="beds">N° di letti</label>
            <input onclick="myFunction()" required class="form-control" type="number" name="beds" id="beds" min="1" />
            @error('beds')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        {{-- N° bagni --}}
        <div class="form-group">
            <label for="bathrooms">N° di bagni</label>
            <input onclick="myFunction()" required class="form-control" type="number" name="bathrooms" id="bathrooms" min="0" />
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

<script>
    function myFunction() {
        const ids = ['title', 'price', 'description', 'address', 'mq2', 'rooms', 'beds', 'bathrooms'];
        const elements = document.querySelectorAll(ids.map(id => `${id}`).join(''));
        elements.classList.add("border-click");
    }

</script>
