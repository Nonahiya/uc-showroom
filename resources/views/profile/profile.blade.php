@extends('layouts.main')
@section('doc_title', $doc_title)
@section('page_title', $page_title)
@section('main_content')

    <div class="container p-5 bg-dark text-white">
        <h1>Profile</h1>
    </div>

    <div class="main-body">

        <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-5">
                            <h6 class="mb-0 text-black"><b>Full Name:</b> {{ $user->customer['name'] }}</h6>
                        </div>
                        <hr>
                        <div class="col-sm-5">
                            <h6 class="mb-0 text-black"><b>Email Address:</b> {{ $user['email'] }} </h6>
                        </div>
                        <hr>
                        <div class=" col-sm-5">
                            <h6 class="mb-0 text-black"><b>Physical Address:</b> {{ $user->customer['address'] }}</h6>
                        </div>
                        <hr>
                        <div class=" col-sm-5">
                            <h6 class="mb-0 text-black"><b>Phone Number:</b> {{ $user->customer['telephone_number'] }}</h6>
                        </div>
                        <hr>
                        <div class=" col-sm-5">
                            <h6 class="mb-0 text-black"><b>Government Identity:</b> {{ $user->customer['card_id'] }}</h6>
                        </div>
                        <hr>
                        <div class=" col-sm-5">
                            <h6 class="mb-0 text-black"><b>Registration Date::</b>
                                {{ date_format($user['created_at'], 'd-m-Y') }}</h6>
                        </div>
                    </div>
            </div>
            <div class="container">
                <div class="card">
                    <div class="ms-3 mt-3">
                        <h3 class="text-black">Order History</h3>
                    </div>
                    <hr>
                    <div class="row justify-content-center ms-2 me-2">
                        <table class="table table-light table-profile">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Employee</th>
                                    <th scope="col">Vehicle Model</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Order Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->customer->orders as $order)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $order->employee['name'] }}
                                        </td>
                                        <td>
                                            @foreach ($order->orderDetails as $orderDetail)
                                                {{ $orderDetail->vehicle['model'] }}
                                                @if (!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($order->orderDetails as $orderDetail)
                                                {{ $orderDetail['quantity'] }}
                                                @if (!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ date_format($order['date']->setTimezone(new DateTimeZone('Asia/Jakarta')), "H:i:s d-m-Y") }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
