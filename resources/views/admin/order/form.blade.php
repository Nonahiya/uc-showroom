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

        <form method="post" action="{{ isset($order) ? route('order.update', $order->id) : route('order.store') }}">
            @csrf

            <div class="mb-3">
                <label for="customer_id" class="form-label"></label>
                <select class="form-select" id="customer_id" name="customer_id" required>
                    <option value="">Choose Customer</option>
                    @foreach ($customers as $customer)
                        <option value={{ $customer->id }} @if ( isset($order->customer) && $order->customer->id == $customer->id ) selected @endif>{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="vehicle_id" class="form-label"></label>
                <select class="form-select" id="vehicle_id" name="vehicle_id" required>
                    <option value="">Choose Vehicle</option>
                    @foreach ($vehicles as $vehicle)
                        <option value={{ $vehicle->id }} @if ( isset($order->vehicle) && $order->vehicle->id == $vehicle->id ) selected @endif>{{ $vehicle->model }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Order Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ isset($order) ? $order->quantity : '' }}" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Order Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ isset($order) ? $order->date : '' }}" required>
            </div>
            
            <button type="submit" class="btn btn-dark">{{ isset($user) ? 'Update' : 'Create' }}</button>
        </form>
    </div>
    <br>
    <br>
    @endsection