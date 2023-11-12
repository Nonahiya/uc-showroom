<?php

namespace App\Http\Controllers\Models;

use App\Models\Customer;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index', [
            "doc_title" => "Customer",
            "page_title" => "UC Showroom",
            "customers" => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.customer.form', [
            "doc_title" => "Customer",
            "page_title" => "UC Showroom",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|unique:users',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'telephone_number' => 'required|string|max:20',
        ]);

        $user = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $customer = Customer::create([
            'user_id' => $user->id,
            'name' => $request['name'],
            'address' => $request['address'],
            'telephone_number' => $request['telephone_number'],
        ]);
        
        return redirect()->route('customer');
    }

    public function storeFromArray(array $data)
    {

        $customer = Customer::create([
            'user_id' => $data['user_id'],
            'name' => $data['name'],
            'address' => $data['address'], 
            'telephone_number' => $data['telephone_number'], 
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.detail', [
            "doc_title" => "Customer",
            "page_title" => "UC Showroom",
            "customer" => $customer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.form', [
            "doc_title" => "Customer",
            "page_title" => "UC Showroom",
            "customer" => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'telephone_number' => 'required|string|max:20',
            'card_id' => 'required|string|max:20'
        ]);

        $customer->update([
            'name' => $request['name'],
            'address' => $request['address'],
            'telephone_number' => $request['telephone_number'],
            'card_id' => $request['card_id'],
        ]);

        return redirect()->route('customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        
        return redirect()->back();
    }
}
