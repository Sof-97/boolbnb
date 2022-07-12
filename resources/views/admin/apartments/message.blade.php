@extends('layouts.backOffice')

@section('content')
    <h2>Message</h2>
    <div class="container">
        @foreach ($apartments as $item)
            @foreach ($item->message as $message)
                <div style=" padding: 20px; border:1px solid black; border-radius: 20px;margin:20px 0;">
                    <p>Messagio da: {{ $message->email_sender }}</p>
                    <p>
                        Contenuto:
                        {{ $message->text }}
                    </p>
                </div>
                @endforeach
                @endforeach
            </div>
@endsection
