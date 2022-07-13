@extends('layouts.backOffice')
@section('content')
    <div class="container">

        <h2>{{ $apartment->title }}</h2>

        <img src="{{ $apartment->cover_image }}" alt="">

        <p>{{ $apartment->description }}</p>
    </div>
@endsection
