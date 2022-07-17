@extends('layouts.backOffice')
@section('title')
    Messaggi
@endsection
@section('content')
    <div class="container-ms">
        <h1 class="title-ms">Messaggi</h1>
        @foreach ($apartments as $apt)
        <div class="singleapartment-ms">
                @foreach ($apt->message as $message)
                    @if ($loop->iteration == 1)
                        <h2 class="apartment-name-ms">Appartamento "{{ $apt->title }}"</h2>
                    @endif
                    <div class="message-ms">
                        <p class="message-sender-ms">Messaggio da: <i>{{ $message->name }}</i></p>
                        <p class="message-sender-ms">Email: <u>{{ $message->email_sender }}</u></p>
                        <p class="message-content-ms">
                            {{ $message->text }}
                        </p>
                    </div>
                @endforeach
        </div>
        @endforeach
    </div>
@endsection
