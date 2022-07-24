@extends('layouts.backOffice')
@section('title')
Sponsorship
@endsection
@section('content')
    <div class="flex-center margin-section">
        <div  class="custom flex apartment-padding space-around items-center">
            @foreach ($sponsorships as $sponsorship)
                @php
                    $duration = substr($sponsorship->duration, 0, strpos($sponsorship->duration, ":"));
                @endphp
                <div class="sponsorship-card">
                    <h2>{{ $sponsorship->name }}</h2>
<<<<<<< HEAD
                    <img src="{{ secure_asset('img/airbnb-logo.png') }}" alt="logo">
                    <p>Durata: {{ $sponsorship->duration }}</p>
                    <p>Prezzo: {{ $sponsorship->price }}</p>
=======
                    <img src="{{ asset('img/airbnb-logo.png') }}" alt="{{ $sponsorship->name }}" class="{{ $sponsorship->name }}">
                    <p>Durata: {{ $duration }} ore</p>
                    <p>Prezzo: {{ $sponsorship->price }}€</p>
>>>>>>> c380dbabf8a3bf20e4187ed9292815070ddb0f31
                    <div class="flex" style="justify-content: flex-end">
                        <button class="button_accent">
                            <a href="{{ url("/admin/payment/$apartment->id/$sponsorship->id") }}">
                                Compra ora
                            </a>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
