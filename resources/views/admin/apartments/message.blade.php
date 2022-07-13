@extends('layouts.backOffice')

@section('content')
    <h1>Messaggi</h1>
    <div class="container">
        @foreach ($apartments as $apt)
        @if ($apt->message)
        <h2>Appartamento "{{ $apt->title }}"</h2>
        @endif
            @foreach ($apt->message as $message)
                <div style=" padding: 20px; border:1px solid black; border-radius: 20px;margin:20px 0;">
                    <p>Messagio da: <u>{{ $message->email_sender }}</u></p>
                    <p>
                        {{ $message->text }}
                    </p>
                </div>
                @endforeach
                @endforeach
            </div>
@endsection
