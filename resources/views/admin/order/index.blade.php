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
            <th>Customer Name</th>
            <th>Vehicle Type</th>
            <th>Vehicle Model</th>
            <th>Quantity</th>
            <th>Order Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row" class="text-center">{{ $order->id }}</th>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->vehicle->type }}</td>
                <td>{{ $order->vehicle->model }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->date }}</td>
                <td>
                    <a href="{{ route('order.show', $order['id']) }}" class="btn btn-dark">Show</a>
                    <a href="{{ route('order.edit', $order['id']) }}" class="btn btn-dark">Edit</a>
                    <a href="{{ route('order.destroy', $order['id']) }}" class="btn btn-dark">Delete</a>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="7">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('order.create') }}" class="btn btn-dark">+ Create</a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<br>
@endsection