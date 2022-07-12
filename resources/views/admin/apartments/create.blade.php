@extends('layouts.create-edit')

@section('content')
    @include('layouts.nav-title')
    <div class="flex-center custom-margin-create">
        <div class="custom">
            <div class="flex-center">
                <h3 class="pill">Aggiungi un appartamento</h3>
            </div>

            <div id="app" class="flex-center">
                <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Titolo appartamento --}}
                    <div class="flex wrap justify-center">
                        <div class="form-group">
                            <input required type="text" class="form-control form-create" name="title" id="title"
                                placeholder="Titolo dell'appartamento" />
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- Prezzo --}}
                        <div class="form-group">
                            <input step="0.01" min="1" type="number" required name="price" id="price"
                                class="form-control price margin-form" placeholder="Prezzo">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    {{-- Descrizione appartamento --}}
                    <div class="form-group">
                        <textarea required type="text" rows="5" class="form-control description-form" name="description"
                            id="description" placeholder="Descrizione"></textarea>
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
                    <div>
                        <h4 class="services-title" style="">Servizi: </h4>
                    </div>
                    <div class="form-group services-form">
                        <ul class="services-ul">
                            @foreach ($services as $service)
                                <li class="list-type">
                                    <input style="margin-right: 15px;" type="checkbox" name="services[]"
                                        value="{{ $service->id }}" id="{{ $service->id }}">
                                    <label style="cursor: pointer" for="{{ $service->id }}">{{ $service->name }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Immagine Copertina --}}
                    <div class="flex">
                        <label class="services-title" for="cover_image">Carica una foto:</label>
                        <div class="form-group image-form">
                            <div class="button-image">
                                <input required type="file" name="cover_image" id="cover_image" class="form-control" />
                                @error('cover_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="flex-evenly">

                        <div class="margin-top-forms">
                            {{-- N° MQ2 --}}
                            <div class="form-group">
                                <input placeholder="Metri quadrati" required class="form-control little-forms"
                                    type="number" name="mq2" id="mq2" min="1" />
                                @error('mq2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- N° Stanze --}}
                            <div class="form-group margin-top-services">
                                <input placeholder="N° di stanze" required class="form-control little-forms" type="number"
                                    name="rooms" id="rooms" min="1" />
                                @error('rooms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="margin-top-forms">
                            {{-- N° letti --}}
                            <div class="form-group">
                                <input placeholder="N° di letti" required class="form-control little-forms" type="number"
                                    name="beds" id="beds" min="1" />
                                @error('beds')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- N° bagni --}}
                            <div class="form-group margin-top-services">
                                <input placeholder="N° di letti" required class="form-control little-forms" type="number"
                                    name="bathrooms" id="bathrooms" min="0" />
                                @error('bathrooms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Visibilità appartamento --}}
                    <div class="form-group radio">
                        <label for="is_visible">Desideri che l'appartamento sia visibile?</label>
                        <div>
                            <input type="radio" name="is_visible" id="is_visible" value="1" /> SI
                            <input type="radio" name="is_visible" id="is_visible" value="0" /> NO
                        </div>


                        @error('is_visible')
                            <br>
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- Submit --}}
                    <div class="text-center margin-top-forms margin-bottom-forms">
                        <button class="button-send" type="submit">Invia</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script defer src="{{ asset('js/formCreate.js') }}"></script>
@endsection
