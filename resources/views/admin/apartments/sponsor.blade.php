@extends('layouts.backOffice')
@section('title')
    Sponsor
@endsection
@section('content')
<h1>ID appartamento: {{ $apartment->id }}</h1>
@foreach ($plans as $plan)
    <button href="{{ route('admin.apartments.bronze', $apartment->id) }}">Compra il piano {{ $plan->name }} a €{{ $plan->price }}</button>

@endforeach
@endsection