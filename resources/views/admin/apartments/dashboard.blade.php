@extends('layouts.backOffice')
@section('title')
    Dashboard
@endsection
@section('content')
    @if (session('success_message'))
        <div class="alert alert-created">
            {{ session('success_message') }}
        </div>  
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-deleted">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex-center padding-dashboard">
        <div class="flex-center custom global-padding" style="flex-direction: column">
            <div class="flex-center movement">
                <h4 class="pill-welcome">Dashboard di {{ $user->name }} {{ $user->surname }}</h4>
            </div>
            <div>
                <h4 class="accent">Novità</h4>
                <p class="p-margin">Da oggi è possibile visualizzare le statistiche! Visualizza il tuo appartamento e vedi
                    l’andamento generale del tuo appartamento. Sei a corto di views? Scegli uno dei nostri pacchetti
                    sponsor. Puoi scegliere tra 3 tariffe diverse, tutte economiche ma estremamente efficienti per vivere
                    un’estate senza pensieri. Pensa a tutto BoolBnB!</p>
            </div>
            <div>
                <h4 class="accent statistics-padding">Le tue statistiche in breve</h4>
                @foreach ($apartments as $apartment)
                    <div class="statistics">
                        <div class="cards">
                            <div class="margin-bottom">
                                <img class="template-image image" src={{ $apartment->cover_image }} alt="">
                            </div>
                            <div class="flex wrap description" style="flex-direction: column;">
                                <div>
                                    <h5 class="spacing-title padding-description">{{ $apartment->title }}
                                        @if (count($apartment->sponsorship) > 0)
                                            <i class="fa-solid fa-crown"></i>
                                        @endif
                                    </h5>
                                </div>
                                <div>
                                    <div class="padding-description">{{ $apartment->description }}</dic>
                                    </div>
                                    <div>
                                        <div>Visualizzazioni annuncio:
                                            {{ count($apartment->view) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="button_accent">
                                    <a href="{{ route('admin.sponsorship', $apartment) }}">Sponsorizza</a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
