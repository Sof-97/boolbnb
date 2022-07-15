@extends('layouts.backOffice')

@section('content')
    <div class="flex-center">
        <div class="flex-center custom padding-dashboard">
            <div>
                <h1>Stats</h1>
                <div>
                    @foreach ($apartments as $apartment)
                        <p>
                            {{ $apartment->title }}
                        </p>
                        <p>
                            {{ count($apartment->view) }}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
