@extends('layouts.create-edit')

@section('content')
    <h2>Create</h2>
    <div id="app">
        <form-create></form-create>
    </div>
    <script defer src="{{ asset('js/formCreate.js') }}"></script>
@endsection
