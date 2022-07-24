@extends('layouts.create-edit')

@section('content')
    @include('layouts.nav-title')
    <div class="flex-center custom-margin-create">
        <div class="custom">
            <div class="flex-center">
                <h3 class="pill">Modifica un appartamento</h3>
            </div>

            <div id="app" class="flex-center">
                <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- Titolo appartamento --}}
                    <div class="flex wrap justify-center">
                        <div class="form-group">
                            <input required type="text" class="form-control form-create form-create-width" name="title"
                                id="title" placeholder="Titolo dell'appartamento"
                                value="{{ old('title', $apartment->title) }}" />
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- Prezzo --}}
                        <div class="form-group">
                            <input step="1" min="1" type="number" required name="price" id="price"
                                class="form-control price form-create margin-form" placeholder="Prezzo"
                                value="{{ old('price', $apartment->price) }}">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Descrizione appartamento --}}
                    <div class="form-group">
                        <textarea required type="text" rows="5" class="form-control margin-top-forms form-create description-form"
                            name="description" id="description" placeholder="Descrizione">{{ old('description', $apartment->description) }}</textarea>
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
                        <h4 class="services-title margin-top-forms" style="">Servizi </h4>
                    </div>
                    <div class="form-group form-create services-form">
                        <ul class="services-ul">
                            @foreach ($services as $service)
                                <li class="list-type">
                                    <input style="margin-right: 15px;" @if (in_array($service->id, old('services', $apartment_services_id))) checked @endif
                                        type="checkbox" name="services[]" value="{{ $service->id }}"
                                        id="{{ $service }}">
                                    <label style="cursor: pointer"
                                        for="{{ $service->id }}">{{ $service->name }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- Immagine Copertina --}}
                    <div>
                        <label class="services-title" for="cover_image">Carica una foto</label>
                    </div>
                    <div class="flex wrap">
                        <div class="form-group margin-top-forms form-create image-form">
                            <div>
                                <input required type="file" name="cover_image" id="cover_image" class="form-control"
                                    value="{{ old('cover_image', $apartment->cover_image) }}" />
                                @error('cover_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="flex-evenly">

                        <div>
                            {{-- N° MQ2 --}}
                            <div class="margin-little-forms-label services-title">Metri quadri</div>
                            <div class="form-group">
                                <input placeholder="Metri quadri" required class="form-control little-forms"
                                    type="number" name="mq2" id="mq2" min="1" max="500"
                                    value="{{ old('mq2', $apartment->mq2) }}" />
                                @error('mq2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- N° Stanze --}}
                            <div class="margin-little-forms-label services-title">Numero di stanze</div>
                            <div class="form-group">
                                <input placeholder="N° di stanze" required class="form-control little-forms" type="number"
                                    name="rooms" id="rooms" min="1" max="15"
                                    value="{{ old('rooms', $apartment->rooms) }}" />
                                @error('rooms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            {{-- N° letti --}}
                            <div class="margin-little-forms-label services-title">Numero di letti</div>
                            <div class="form-group">
                                <input placeholder="N° di letti" required class="form-control little-forms" type="number"
                                    name="beds" id="beds" min="1" max="15"
                                    value="{{ old('beds', $apartment->beds) }}" />
                                @error('beds')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- N° bagni --}}
                            <div class="margin-little-forms-label services-title">Numero di bagni</div>
                            <div class="form-group">
                                <input placeholder="N° di letti" required class="form-control little-forms" type="number"
                                    name="bathrooms" id="bathrooms" min="1" max="15"
                                    value="{{ old('bathrooms', $apartment->bathrooms) }}" />
                                @error('bathrooms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Visibilità appartamento --}}
                    <div class="form-group radio">
                        <label for="is_visible" class="services-title">Visibilità</label>
                        <div class="select-visible">
                            <select class="select-form-visible" name="is_visible" id="is_visible">
                                <option value="1" @if ($apartment->is_visible) checked @endif>Sì</option>
                                <option value="0" @if (!$apartment->is_visible) checked @endif>No</option>
                            </select>
                        </div>


                        @error('is_visible')
                            <br>
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- Submit --}}
                    <div class="text-center margin-top-forms margin-bottom-forms">
                        <button class="button-send" type="submit">Modifica</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script defer src="{{ secure_asset('js/formCreate.js') }}"></script>
@endsection
