@extends('layouts.backOffice')
@section('title')
    Sponsorship
@endsection
@section('content')
    <div class="flex-center margin-section">
        <div style="height: 80vh;" class="custom flex apartment-padding space-around items-center">
            @foreach ($sponsorships as $sponsorship)
                <div class="sponsorship-card">
                    <h2>{{ $sponsorship->name }}</h2>
                    <img src="{{ asset('img/airbnb-logo.png') }}" alt="logo">
                    <p>Durata: {{ $sponsorship->duration }}</p>
                    <p>Prezzo: {{ $sponsorship->price }}</p>
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
