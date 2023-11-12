<?php

namespace App\Http\Controllers\Models;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', [
            "doc_title" => "Order",
            "page_title" => "UC Showroom",
            "orders" => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $vehicles = Vehicle::all();
        return view('admin.order.form', [
            "doc_title" => "Order",
            "page_title" => "UC Showroom",
            "customers" => $customers,
            "vehicles" => $vehicles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date',
            'quantity' => 'required|integer',
        ]);

        $order = Order::create([
            'customer_id' => $request['customer_id'],
            'vehicle_id' => $request['vehicle_id'],
            'quantity' => $request['quantity'],
            'date' => $request['date'],
        ]);
        
        return redirect()->route('order');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::findOrfail($id);
        $totalPrice = $order->vehicle->price * $order->quantity;

        return view('admin.order.detail', [
            "doc_title" => "Order",
            "page_title" => "UC Showroom",
            "order" => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $customers = Customer::all();
        $vehicles = Vehicle::all();
        return view('admin.order.form', [
            "doc_title" => "Order",
            "page_title" => "UC Showroom",
            "order" => $order,
            "customers" => $customers,
            "vehicles" => $vehicles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $this->validate($request, [
            'date' => 'required|date',
            'quantity' => 'required|integer',
        ]);

        $order->update([
            'vehicle_id' => $request['vehicle_id'],
            'quantity' => $request['quantity'],
            'date' => $request['date'],
        ]);

        return redirect()->route('order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        if (count($orderDetails) > 0)
        {
            foreach ($orderDetails as $orderDetail)
            {
                $orderDetail->delete();
            }
        }

        $order->delete();
        
        return redirect()->back();
    }
}
