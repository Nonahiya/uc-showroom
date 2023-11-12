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
                <th>ID</th>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td>{{ $order->customer->name }}</td>
            </tr>
            <tr>
                <th>Vehicle Type</th>
                <td>{{ $order->vehicle->type }}</td>
            </tr>
            <tr>
                <th>Vehicle Model</th>
                <td>{{ $order->vehicle->model }}</td>
            </tr>
            <tr>
                <th>Vehicle Price</th>
                <td>{{ $order->vehicle->price }}$</td>
            </tr>
            <tr>
                <th>Order Quantity</th>
                <td>{{ $order->quantity }}</td>
            </tr>
            <tr>
                <th>Order Date</th>
                <td>{{ $order->date }}</td>
            </tr>
        </table>
    </div>
@endsection
