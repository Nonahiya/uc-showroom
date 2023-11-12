<?php

namespace App\Http\Controllers\Models;

use App\Models\Vehicle;
use App\Models\Car;
use App\Models\Truck;
use App\Models\Motorcycle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicle.index', [
            "doc_title" => "Vehicle",
            "page_title" => "UC Showroom",
            "vehicles" => $vehicles,
        ]);
    }

    public function create()
    {
        return view('admin.vehicle.form', [
            "doc_title" => "Vehicle",
            "page_title" => "UC Showroom",
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'model' => 'required',
            'year' => 'required|numeric',
            'passenger_quantity' => 'required|numeric',
            'manufacturer' => 'required',
            'price' => 'required|numeric',
            'fuel_type' => 'required_if:type,Car',
            'trunk_area' => 'required_if:type,Car',
            'wheel_quantity' => 'required_if:type,Truck',
            'cargo_area' => 'required_if:type,Truck',
            'fuel_capacity' => 'required_if:type,Motorcycle',
            'trunk_size' => 'required_if:type,Motorcycle',
        ]);

        $vehicle = Vehicle::create([
            'type' => $request['type'],
            'model' => $request['model'],
            'year' => $request['year'],
            'passenger_quantity' => $request['passenger_quantity'],
            'manufacturer' => $request['manufacturer'],
            'price' => $request['price'],
        ]);

        if ($request['type'] === 'Car') {
            $vehicle->car()->create([
                'fuel_type' => $request['fuel_type'],
                'trunk_area' => $request['trunk_area'],
            ]);
        } elseif ($request['type'] === 'Truck') {
            $vehicle->truck()->create([
                'wheel_quantity' => $request['wheel_quantity'],
                'cargo_area' => $request['cargo_area'],
            ]);
        } elseif ($request['type'] === 'Motorcycle') {
            $vehicle->motorcycle()->create([
                'fuel_capacity' => $request['fuel_capacity'],
                'trunk_size' => $request['trunk_size'],
            ]);
        }
        
        return redirect()->route('vehicle');
    }

    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicle.detail', [
            "doc_title" => "Vehicle",
            "page_title" => "UC Showroom",
            "vehicle" => $vehicle,
        ]);
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicle.form', [
            "doc_title" => "Vehicle",
            "page_title" => "UC Showroom",
            "vehicle" => $vehicle,
        ]);
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $this->validate($request, [
            'type' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'passenger_quantity' => 'required|integer',
            'manufacturer' => 'required',
            'price' => 'required|numeric',
            'fuel_type' => 'required_if:type,Car',
            'trunk_area' => 'required_if:type,Car',
            'wheel_quantity' => 'required_if:type,Truck',
            'cargo_area' => 'required_if:type,Truck',
            'fuel_capacity' => 'required_if:type,Motorcycle',
            'trunk_size' => 'required_if:type,Motorcycle',
        ]);

        $vehicle->update([
            'type' => $request['type'],
            'model' => $request['model'],
            'year' => $request['year'],
            'passenger_quantity' => $request['passenger_quantity'],
            'manufacturer' => $request['manufacturer'],
            'price' => $request['price'],
        ]);

        if ($request['type'] === 'Car') {
            $vehicle->car()->update([
                'fuel_type' => $request['fuel_type'],
                'trunk_area' => $request['trunk_area'],
            ]);
        } elseif ($request['type'] === 'Truck') {
            $vehicle->truck()->update([
                'wheel_quantity' => $request['wheel_quantity'],
                'cargo_area' => $request['cargo_area'],
            ]);
        } elseif ($request['type'] === 'Motorcycle') {
            $vehicle->motorcycle()->update([
                'fuel_capacity' => $request['fuel_capacity'],
                'trunk_size' => $request['trunk_size'],
            ]);
        }
        
        return redirect()->route('vehicle');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        if ($vehicle->jenis === 'Car') {
            $vehicle->car()->delete();
        } elseif ($vehicle->jenis === 'Truck') {
            $vehicle->truck()->delete();
        } elseif ($vehicle->jenis === 'Motorcycle') {
            $vehicle->motorcycle()->delete();
        }

        $vehicle->delete();

        return redirect()->back();
    }
}
