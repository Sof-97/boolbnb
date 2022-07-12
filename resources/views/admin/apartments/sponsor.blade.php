@extends('layouts.backOffice')
@section('title')
    Sponsor
@endsection
@section('content')
<h1>ID appartamento: {{ $apartment->id }}</h1>
@foreach ($plans as $plan)
    <button>Compra il piano {{ $plan->name }} a €{{ $plan->price }}</button>

@endforeach
@endsection