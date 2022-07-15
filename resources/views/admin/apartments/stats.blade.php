@extends('layouts.backOffice')

@section('content')
<div class="container-ms">
    <h1 class="title-ms">Stats</h1>
    @foreach ($apartments as $apartment)
    <div class="singleapartment-ms">
        <h2 class="apartment-name-ms">Appartamento "{{ $apartment->title }}"</h2>
        <p>Visite totali: {{ count($apartment->view) }}</p>
        <input type="number" id="input{{ $apartment->id }}" value="{{ count($apartment->view) }}" hidden>
        <canvas id="myChart" width="400" height="100"></canvas>

        @endforeach
    </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script defer>
    const ctx = 'myChart';
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
            datasets: [{
                label: 'Visite',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: ['#ff385c','white','#ff385c','white','#ff385c','white','#ff385c','white','#ff385c','white','#ff385c','white'],
                borderColor: ['#ff385c','gray','#ff385c','gray','#ff385c','gray','#ff385c','gray','#ff385c','gray','#ff385c','gray'],
                borderWidth: 1
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