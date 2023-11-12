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

        <form method="post" action="{{ isset($customer) ? route('customer.update', $vehicle->id) : route('customer.store') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ isset($user) ? $user->password : '' }}" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($customer) ? $customer->name : '' }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Physical Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ isset($customer) ? $customer->address : '' }}" required>
            </div>

            <div class="mb-3">
                <label for="telephone_number" class="form-label">Telephone Number</label>
                <input type="number" class="form-control" id="telephone_number" name="telephone_number" value="{{ isset($customer) ? $customer->telephone_number : ''}}" required>
            </div>
    
            <button type="submit" class="btn btn-dark">{{ isset($user) ? 'Update' : 'Create' }}</button>
        </form>
    </div>
    <br>
    <br>
    @endsection