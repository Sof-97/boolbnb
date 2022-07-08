@extends('layouts.backOffice')

@section('content')

<div class="flex-right">
    <div>
        <div>
            <h4>Questa è la dashboard di {{ $user->name }} {{ $user->surname }}</h4>
        </div>
        <div>
            <div>
                <h4>Novità</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacinia volutpat eros, vel volutpat
                    tellus porta vitae. Nam lobortis blandit mauris vel lacinia. Proin dignissim vestibulum rutrum. Cras
                    porttitor elit vehicula ligula blandit pharetra. Nunc ac augue quis nisl tincidunt ornare et nec
                    est.
                    Fusce non ante orci. Pellentesque diam purus, aliquet eu cursus in, ultricies a sem.</p>
            </div>
        </div>
        <div >
            <h4 class="spacing-title">Le tue statistiche in breve</h4>
            <div class="brief-statistics">
                @foreach ($apartments as $apartment)
                <div class="statistics">
                    <div>
                        <img class="template-image" src={{ $apartment->cover_image }} alt="">
                    </div>
                    <div class="statistics-written">
                        <div>
                            <h5 class="spacing-title">{{ $apartment->title }}</h5>
                        </div>
                        <div>
                            <p>{{ $apartment->description }}</p>
                        </div>
                        <div>
                            <div>views</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>


<style>
    @import "../../resources/sass/app.scss";

</style>
@endsection
