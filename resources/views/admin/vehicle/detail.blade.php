@extends('../layouts.main')
@section('doc_title', $doc_title)
@section('page_title', $page_title)
@section('main_content')

<div class="container p-5 bg-black text-white">
    <h1>{{ $doc_title }} Details</h1>
</div>

<div class="container">

    <table class="container table w-50">
        <tr>
            <th>Type</th>
            <td>{{ $vehicle->type }}</td>
        </tr>
        <tr>
            <th>Model</th>
            <td>{{ $vehicle->model }}</td>
        </tr>
        <tr>
            <th>Year</th>
            <td>{{ $vehicle->year }}</td>
        </tr>
        <tr>
            <th>Passenger Quantity</th>
            <td>{{ $vehicle->passenger_quantity }}</td>
        </tr>
        <tr>
            <th>Manufacturer</th>
            <td>{{ $vehicle->manufacturer }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $vehicle->price }}$</td>
        </tr>
        @if ($vehicle->type == "Car" && isset($vehicle->car))
            <tr>
                <th>Fuel Type</th>
                <td>{{ $vehicle->car->fuel_type }}</td>
            </tr>
            <tr>
                <th>Trunk Area</th>
                <td>{{ $vehicle->car->trunk_area }}L</td>
            </tr>
        @elseif ($vehicle->type == "Truck" && isset($vehicle->truck))
            <tr>
                <th>Wheel Quantity</th>
                <td>{{ $vehicle->truck->wheel_quantity }}</td>
            </tr>
            <tr>
                <th>Cargo Area</th>
                <td>{{ $vehicle->truck->cargo_area }}L</td>
            </tr>
        @elseif ($vehicle->type == "Motorcycle" && isset($vehicle->motorcycle))
            <tr>
                <th>Fuel Capacity</th>
                <td>{{ $vehicle->motorcycle->fuel_capacity }}</td>
            </tr>
            <tr>
                <th>Trunk Area</th>
                <td>{{ $vehicle->motorcycle->trunk_size }}L</td>
            </tr>
        @endif
    </table>
</div>
@endsection
