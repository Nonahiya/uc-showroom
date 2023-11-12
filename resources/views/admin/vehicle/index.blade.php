@extends('../layouts.main')
@section('doc_title', $doc_title)
@section('page_title', $page_title)
@section('main_content')

<div class="container p-5 bg-black text-white">
    <h1>{{ $doc_title }}</h1>
  </div>

  <table class="container table table-bordered w-100">
    <thead>
        <tr class="text-center">
            <th>ID</th>
            <th>Type</th>
            <th>Model</th>
            <th>Year</th>
            <th>Passenger Quantity</th>
            <th>Manufacturer</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if (count($vehicles) > 0)
        @foreach($vehicles as $vehicle)
            <tr>
                <th scope="row" class="text-center">{{ $vehicle->id }}</th>
                <td>{{ $vehicle->type }}</td>
                <td>{{ $vehicle->model }}</td>
                <td>{{ $vehicle->year }}</td>
                <td>{{ $vehicle->passenger_quantity }}</td>
                <td>{{ $vehicle->manufacturer }}</td>
                <td>{{ $vehicle->price }}</td>
                <td>
                    <a href="{{ route('vehicle.show', $vehicle['id']) }}" class="btn btn-dark">Show</a>
                    <a href="{{ route('vehicle.edit', $vehicle['id']) }}" class="btn btn-dark">Edit</a>
                    <a href="{{ route('vehicle.destroy', $vehicle['id']) }}" class="btn btn-dark">Delete</a>
                </td>
            </tr>
        @endforeach
        @endif
        <tr>
            <td colspan="8">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('vehicle.create') }}" class="btn btn-dark">+ Create</a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<br>
@endsection