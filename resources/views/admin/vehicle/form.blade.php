@extends('../layouts.main')
@section('doc_title', $doc_title)
@section('page_title', $page_title)
@section('main_content')

<div class="container p-5 bg-black text-white">
    <h1>{{ $doc_title }} Details</h1>
  </div>

@if ($errors->any())
 @foreach ($errors->all() as $error)
    <div class="alert alert-warning alert-dismissable custom-warning-box" style="margin: 15px;">{{$error}}</div>
 @endforeach
@endif

    <div class="container w-50">

        <form method="post" action="{{ isset($vehicle) ? route('vehicle.update', $vehicle->id) : route('vehicle.store') }}">
            @csrf

            
            <div class="mb-3">
                <label for="type" class="form-label"></label>
                <select class="form-select" id="type" name="type" required onchange="toggleFields()">
                    <option value="">Choose Vehicle Type</option>
                    <option value="Car" @if ( isset($vehicle) && $vehicle->type == 'Car' ) selected @endif>Car</option>
                    <option value="Truck" @if ( isset($vehicle) && $vehicle->type == 'Truck' ) selected @endif>Truck</option>
                    <option value="Motorcycle" @if ( isset($vehicle) && $vehicle->type == 'Motorcycle' ) selected @endif>Motorcycle</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ isset($vehicle) ? $vehicle->model : '' }}" required>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ isset($vehicle) ? $vehicle->year : '' }}" required>
            </div>

            <div class="mb-3">
                <label for="passenger_quantity" class="form-label">Passenger Quantity</label>
                <input type="number" class="form-control" id="passenger_quantity" name="passenger_quantity" value="{{ isset($vehicle) ? $vehicle->passenger_quantity : ''}}" required>
            </div>
            
            <div class="mb-3">
                <label for="manufacturer" class="form-label">Manufacturer</label>
                <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ isset($vehicle) ? $vehicle->manufacturer : ''}}" required>
            </div>
            
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ isset($vehicle) ? $vehicle->price : ''}}" required>
            </div>

            <!-- Other common fields -->

            <div class="mb-3" id="fuelTypeGroup" style="display: none;">
                <label for="fuel_type" class="form-label">Fuel Type</label>
                <input type="text" class="form-control" id="fuel_type" name="fuel_type" value="{{ isset($vehicle->car) ? $vehicle->car->fuel_type : '' }}" required>
            </div>
    
            <div class="mb-3" id="trunkAreaGroup" style="display: none;">
                <label for="trunk_area" class="form-label">Trunk Area</label>
                <input type="number" class="form-control" id="trunk_area" name="trunk_area" value="{{ isset($vehicle->car) ? $vehicle->car->trunk_area : '' }}" required>
            </div>
    
            <div class="mb-3" id="wheelQuantityGroup" style="display: none;">
                <label for="wheel_quantity" class="form-label">Wheel Quantity</label>
                <input type="number" class="form-control" id="wheel_quantity" name="wheel_quantity" value="{{ isset($vehicle->truck) ? $vehicle->truck->wheel_quantity : '' }}" required>
            </div>
    
            <div class="mb-3" id="cargoAreaGroup" style="display: none;">
                <label for="cargo_area" class="form-label">Cargo Area</label>
                <input type="number" class="form-control" id="cargo_area" name="cargo_area" value="{{ isset($vehicle->truck) ? $vehicle->truck->cargo_area : '' }}" required>
            </div>
    
            <div class="mb-3" id="fuelCapacityGroup" style="display: none;">
                <label for="fuel_capacity" class="form-label">Fuel Capacity</label>
                <input type="text" class="form-control" id="fuel_capacity" name="fuel_capacity" value="{{ isset($vehicle->motorcycle) ? $vehicle->motorcycle->fuel_capacity : '' }}" required>
            </div>
    
            <div class="mb-3" id="trunkSizeGroup" style="display: none;">
                <label for="trunk_size" class="form-label">Trunk Size</label>
                <input type="number" class="form-control" id="trunk_size" name="trunk_size" value="{{ isset($vehicle->motorcycle) ? $vehicle->motorcycle->trunk_size : '' }}" required>
            </div>
    
            <button type="submit" class="btn btn-dark">{{ isset($user) ? 'Update' : 'Create' }}</button>
        </form>
    </div>
    <br>
    <br>
    
    <script>
        function toggleFields() {
            var type = document.getElementById('type').value;
    
            // Reset all fields to hidden
            document.getElementById('fuelTypeGroup').style.display = 'none';
            document.getElementById('trunkAreaGroup').style.display = 'none';
            document.getElementById('wheelQuantityGroup').style.display = 'none';
            document.getElementById('cargoAreaGroup').style.display = 'none';
            document.getElementById('fuelCapacityGroup').style.display = 'none';
            document.getElementById('trunkSizeGroup').style.display = 'none';
    
            // Display fields based on the selected type
            if (type === 'Car') {
                document.getElementById('fuelTypeGroup').style.display = 'block';
                document.getElementById('trunkAreaGroup').style.display = 'block';
            } else if (type === 'Truck') {
                document.getElementById('wheelQuantityGroup').style.display = 'block';
                document.getElementById('cargoAreaGroup').style.display = 'block';
            } else if (type === 'Motorcycle') {
                document.getElementById('fuelCapacityGroup').style.display = 'block';
                document.getElementById('trunkSizeGroup').style.display = 'block';
            }
    
            // Set or remove 'required' attribute based on visibility
            document.getElementById('fuel_type').required = (type === 'Car');
            document.getElementById('trunk_area').required = (type === 'Car');
            document.getElementById('wheel_quantity').required = (type === 'Truck');
            document.getElementById('cargo_area').required = (type === 'Truck');
            document.getElementById('fuel_capacity').required = (type === 'Motorcycle');
            document.getElementById('trunk_size').required = (type === 'Motorcycle');
        }
        
        // Call the toggleFields function when the page loads
        window.onload = toggleFields;
    </script>
    @endsection