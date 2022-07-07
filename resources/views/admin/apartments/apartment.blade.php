@extends('layouts.backOffice')
@section('content')
    @if (session('deleted'))
        <div class="alert alert-danger">
            {{ session('deleted') }}
        </div>
    @elseif (session('modified'))
        <div class="alert alert-success">
            {{ session('modified') }}
        </div>
    @elseif (session('created'))
        <div class="alert alert-primary">
            {{ session('created') }}
        </div>
    @endif

    <div class="d-flex justify-content-center mt-4 mb-4 align-items-center">
        <div class="custom">
            <div class="d-flex justify-content-between m-3">
                <div>
                    <h2 class="text-center h2-color p-2">Appartamenti</h2>
                </div>
                <div>
                    <button class="btn btn-success btn-color">
                        <a class="text-light text-decoration-none" href="{{ route('admin.apartments.create') }}">
                            Aggiungi Appartamento
                        </a>
                    </button>
                </div>
            </div>

            <div class="d-flex">
                <div>
                    <table class="table ">
                        {{-- <thead>
            <tr>
                <th scope="col">Cover Image</th>
                 <th scope="col">ID</th> 
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                 <th scope="col">Latitude</th>
                <th scope="col">Longitude</th> 
                <th scope="col">Address</th>
                <th scope="col">Rooms</th>
                <th scope="col">Beds</th>
                <th scope="col">Bathrooms</th>
                <th scope="col">MQ2</th>
                 <th scope="col">Is Visible</th> 
                <th scope="col">Action
 
                </th>
            </tr>
        </thead> --}}
                        <tbody>
                            @foreach ($apartments as $apartment)
                                <tr>
                                    <td><img src="{{ $apartment->cover_image }}" alt=""
                                            style="width: 100px; height: 100px; margin-left: 20px;"></td>
                                    {{-- <td>{{ $apartment->id }}</td> --}}
                                    <td>{{ $apartment->title }}</td>
                                    <td>{{ $apartment->description }}</td>
                                    {{-- <td>{{ $apartment->latitude }}</td>
                            <td>{{ $apartment->longitude }}</td> --}}
                                    <td>{{ $apartment->address }}</td>
                                    {{-- <td>{{ $apartment->rooms }}</td>
                            <td>{{ $apartment->beds }}</td>
                            <td>{{ $apartment->bathrooms }}</td>
                            <td>{{ $apartment->mq2 }}</td> --}}
                                    {{-- <td>{{ $apartment->is_visible }}</td> --}}
                                    <td>
                                        <button class="button-show">
                                            <a href="{{ route('admin.apartments.show', $apartment->id) }}"
                                                class="text-decoration-none button-show">
                                                Visualizza
                                            </a>
                                        </button>
                                        <button class="button-show">
                                            <a href="{{ route('admin.apartments.edit', $apartment->id) }}"
                                                class="text-decoration-none button-show">
                                                Modifica
                                            </a>
                                        </button>
                                        {{-- DELETE --}}
                                        <form action="{{ route('admin.apartments.destroy', $apartment->id) }}"
                                            method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button-show" type="submit" class="delete-form">
                                                Elimina
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/confirmDelete.js') }}"></script>
    <style>
        @import "../../resources/sass/app.scss";
    </style>
@endsection
