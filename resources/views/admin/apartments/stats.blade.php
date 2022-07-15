@extends('layouts.backOffice')

@section('content')
<div class="container-ms">
    <h1 class="title-ms">Stats</h1>
    @foreach ($apartments as $apartment)
    <div class="singleapartment-ms">
    <h2 class="apartment-name-ms">{{ $apartment->title }}</h2>
            
        <p>
            {{ count($apartment->view) }}
        </p>
        @endforeach
    </div>
</div>
@endsection