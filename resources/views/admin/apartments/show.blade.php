@extends('layouts.backOffice')
@section('content')
    <div class="flex-center padding-show">
        <div class="custom padding-show">
            <div class="">
                <div class="pill-show">
                    <h2>{{ $apartment->title }}</h2>
                </div>
            </div>
            <div class="flex align-center">
                <div class="relative">
                    <div class="block">
                        <img style="width: 300px; z-index: 1;" src="{{ $apartment->cover_image }}" alt="">
                    </div>
                    <div class="flex-center icons-absolute">
                        <div class="flex">
                            <i class="fa-solid fa-door-closed"></i>
                            <p>{{ $apartment->rooms }}</p>
                        </div>
                        <div class="flex">
                            <i class="fa-solid fa-bed"></i>
                            <span>{{ $apartment->beds }}</span>
                        </div>
                        <div class="flex">
                            <i class="fa-solid fa-bath"></i>
                            <span>{{ $apartment->bathrooms }}</span>
                        </div>
                        <div class="flex">
                            <i class="fa-solid fa-house"></i>
                            <span>{{ $apartment->mq2 }}</span>
                        </div>
                    </div>
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
                            @foreach ($apartment->service as $service)
                                <li>
                                    {{ $service->name }}
                                </li>
                            @endforeach
                        </ul>
                        <div class="flex" style="justify-content: flex-end; margin-top:auto;">
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
    @endsection
