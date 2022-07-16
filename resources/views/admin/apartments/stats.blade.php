@extends('layouts.backOffice')
@section('title')
Statistiche
@endsection
@section('content')
<div class="container-ms">
    <h1 class="title-ms">Stats</h1>
    @foreach ($apartments as $apartment)
    <div class="singleapartment-ms">
        <h2 class="apartment-name-ms">Appartamento "{{ $apartment->title }}"</h2>
        <p>Visite totali: {{ count($apartment->view) }}</p>
        <input type="number" id="input{{ $apartment->id }}" value="{{ count($apartment->view) }}" hidden>
        <canvas id="myChart{{ $apartment->id }}" width="400" height="100"></canvas>
</div>
        @endforeach
    
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script defer>
    const ctx = 'myChart1';
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
            datasets: [{
                label: 'Visite',
                data: [
                @php if(count($apartment->view->whereBetween('created_at', ['2022-01-01 00:00:00', '2022-01-31 23:59:59'])) == 0){echo(null);}
                else{echo(count($apartment->view->whereBetween('created_at', ['2022-01-01 00:00:00', '2022-01-31 23:59:59'])));}@endphp,
                @php if(count($apartment->view->whereBetween('created_at', ['2022-02-01 00:00:00', '2022-02-31 23:59:59'])) == 0){echo(null);}
                else{echo(count($apartment->view->whereBetween('created_at', ['2022-02-01 00:00:00', '2022-02-31 23:59:59'])));}@endphp,
                @php if(count($apartment->view->whereBetween('created_at', ['2022-03-01 00:00:00', '2022-03-31 23:59:59'])) == 0){echo(null);}
                else{echo(count($apartment->view->whereBetween('created_at', ['2022-03-01 00:00:00', '2022-03-31 23:59:59'])));}@endphp,
                @php if(count($apartment->view->whereBetween('created_at', ['2022-04-01 00:00:00', '2022-04-31 23:59:59'])) == 0){echo(null);}
                else{echo(count($apartment->view->whereBetween('created_at', ['2022-04-01 00:00:00', '2022-04-31 23:59:59'])));}@endphp,
                @php if(count($apartment->view->whereBetween('created_at', ['2022-05-01 00:00:00', '2022-05-31 23:59:59'])) == 0){echo(null);}
                else{echo(count($apartment->view->whereBetween('created_at', ['2022-05-01 00:00:00', '2022-05-31 23:59:59'])));}@endphp,
                @php if(count($apartment->view->whereBetween('created_at', ['2022-06-01 00:00:00', '2022-06-31 23:59:59'])) == 0){echo(null);}
                else{echo(count($apartment->view->whereBetween('created_at', ['2022-06-01 00:00:00', '2022-06-31 23:59:59'])));}@endphp,
                @php if(count($apartment->view->whereBetween('created_at', ['2022-07-01 00:00:00', '2022-07-31 23:59:59'])) == 0){echo(null);}
                else{echo(count($apartment->view->whereBetween('created_at', ['2022-07-01 00:00:00', '2022-07-31 23:59:59'])));}@endphp,
                @php if(count($apartment->view->whereBetween('created_at', ['2022-08-01 00:00:00', '2022-08-31 23:59:59'])) == 0){echo(null);}
                else{echo(count($apartment->view->whereBetween('created_at', ['2022-08-01 00:00:00', '2022-08-31 23:59:59'])));}@endphp,
                @php if(count($apartment->view->whereBetween('created_at', ['2022-09-01 00:00:00', '2022-09-31 23:59:59'])) == 0){echo(null);}
                else{echo(count($apartment->view->whereBetween('created_at', ['2022-09-01 00:00:00', '2022-09-31 23:59:59'])));}@endphp,
                @php if(count($apartment->view->whereBetween('created_at', ['2022-10-01 00:00:00', '2022-10-31 23:59:59'])) == 0){echo(null);}
                else{echo(count($apartment->view->whereBetween('created_at', ['2022-10-01 00:00:00', '2022-10-31 23:59:59'])));}@endphp,
                @php if(count($apartment->view->whereBetween('created_at', ['2022-11-01 00:00:00', '2022-11-31 23:59:59'])) == 0){echo(null);}
                else{echo(count($apartment->view->whereBetween('created_at', ['2022-11-01 00:00:00', '2022-11-31 23:59:59'])));}@endphp,
                @php if(count($apartment->view->whereBetween('created_at', ['2022-12-01 00:00:00', '2022-12-31 23:59:59'])) == 0){echo(null);}
                else{echo(count($apartment->view->whereBetween('created_at', ['2022-12-01 00:00:00', '2022-12-31 23:59:59'])));}@endphp,
            ],
                backgroundColor: '#ff385c',
                borderColor: '#ff385c',
                borderWidth: 5
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection