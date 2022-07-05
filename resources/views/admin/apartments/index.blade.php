@extends('layouts.dashboard')
@section('content')
    <h2 class="text-center p-2">Appartementi</h2>
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
    <table class="table table-dark">
        <thead>
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
                    <button class="btn btn-success ml-4">
                        <a class="text-light text-decoration-none" href="{{ route('admin.apartments.create') }}">
                            Crea
                        </a>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apartments as $apartment)
                <tr>
                    <td><img src="{{ $apartment->cover_image }}" alt="" style="width: 100px; height: 100px;"></td>
                    <td>{{ $apartment->id }}</td>
                    <td>{{ $apartment->title }}</td>
                    <td>{{ $apartment->description }}</td>
                    <td>{{ $apartment->latitude }}</td>
                    <td>{{ $apartment->longitude }}</td>
                    <td>{{ $apartment->address }}</td>
                    <td>{{ $apartment->rooms }}</td>
                    <td>{{ $apartment->beds }}</td>
                    <td>{{ $apartment->bathrooms }}</td>
                    <td>{{ $apartment->mq2 }}</td>
                    <td>{{ $apartment->is_visible }}</td>
                    <td>
                        <button class="btn btn-primary m-1">
                            <a href="{{ route('admin.apartments.show', $apartment->id) }}"
                                class="text-light text-decoration-none">
                                Visualizza
                            </a>
                        </button>
                        <button class="btn btn-warning m-1">
                            <a href="{{ route('admin.apartments.edit', $apartment->id) }}">
                                Modifica
                            </a>
                        </button>
                        {{-- DELETE --}}
                        <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST"
                            class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" class="delete-form">
                                Elimina
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="{{asset('js/confirmDelete.js')}}"></script>
@endsection
