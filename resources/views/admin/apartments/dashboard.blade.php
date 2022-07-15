@extends('layouts.backOffice')
@section('title')
    Dashboard
@endsection
@section('content')
    @if (session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex-center padding-dashboard">
        <div class="flex-center custom global-padding">
            <div class="">
                <div class="flex-center movement">
                    <div>
                        <div style="width: 20vw" class="dash-title">
                            <h4 class="pill-welcome">Dashboard di {{ $user->name }} {{ $user->surname }}</h4>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <h4 class="accent">Novità</h4>
                        <p class="p-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacinia volutpat
                            eros, vel volutpat
                            tellus porta vitae. Nam lobortis blandit mauris vel lacinia. Proin dignissim vestibulum rutrum.
                            Cras
                            porttitor elit vehicula ligula blandit pharetra. Nunc ac augue quis nisl tincidunt ornare et nec
                            est.Fusce non ante orci. Pellentesque diam purus, aliquet eu cursus in, ultricies a sem.</p>
                    </div>
                </div>
                <div>
                    <h4 class="accent statistics-padding">Le tue statistiche in breve</h4>
                    <div>
                        @foreach ($apartments as $apartment)
                            <div class="statistics">
                                <div class="cards">
                                    <div class="margin-bottom">
                                        <img class="template-image image" src={{ $apartment->cover_image }}
                                            alt="">
                                    </div>
                                    <div class="flex wrap description" style="flex-direction: column;">
                                        <div class="flex align-center spacing-title padding-description">
                                            <h5>{{ $apartment->title }}</h5>
                                            @if (count($apartment->sponsorship)>0)
                                                <span><i class="fa-solid fa-crown"></i></span>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="padding-description">{{ $apartment->description }}</dic>
                                            </div>
                                            <div>
                                                <div>Visualizzazioni annuncio:
                                                    {{ $viewsTotal[$apartment->id] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="button_accent">
                                            <a href="{{ route('admin.sponsorship', $apartment) }}">
                                                Sponsorizza
                                            </a>
                                        </button>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
