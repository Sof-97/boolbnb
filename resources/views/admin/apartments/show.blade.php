@extends('layouts.backOffice')
@section('title')
{{ $apartment->title }}
@endsection
@section('content')
    <div class="flex-center padding-show">
        <div class="custom padding-show">
                <div class="pill-show custom">
                    <h2>{{ $apartment->title }}</h2>
            </div>
            <div class="flex align-center wrap-query">
                    <div class="block">
                        <img class="aptimg" src="{{ $apartment->cover_image }}" alt="{{ $apartment->title }}">
                    </div>
                    <div class="info-show flex">
                        <div>
                            <div class="margin-show-info">
                                <span class="color-show">Breve descrizione:</span>
                                <p style="margin-top: 10px">{{ $apartment->description }}</p>
                            </div>
                            <div>
                                <div class="margin-show-info">
                                    <div class="margin-show-title color-show">Prezzo:</div>
                                    <span>{{ $apartment->price }}</span>
                                </div>
                                <div class="margin-show-info">
                                    <span class="color-show">Indirizzo:</span>
                                    <div style="margin-top: 10px">{{ $apartment->address }}</div>
                                </div>
                                <div class="margin-show-info">
                                    <div class="margin-show-title color-show">Postato il:</div>
                                    <span>{{ $apartment->created_at }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="show-services">
                            <span class="sa-price">Servizi inclusi:</span>
                            <ul>
                                @forelse ($apartment->service as $service)
                                    <li>
                                        {{ $service->name }}
                                    </li>
                                @empty
                                    <li>Nessun servizio</li>
                                @endforelse
                            </ul>
                            <div class="flex" style=" margin-top:1rem;">
                                <button class="button_accent" style="margin-right: 0.5rem">
                                    <a href="{{ route('admin.stats', $apartment) }}">
                                        Statistiche
                                    </a>
                                </button>
                                <button class="button_accent">
                                    <a href="{{ route('admin.sponsorship', $apartment) }}">
                                        Sponsorizza
                                    </a>
                                </button>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>
@endsection
