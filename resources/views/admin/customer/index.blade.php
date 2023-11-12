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
            <th>Name</th>
            <th>Physical Address</th>
            <th>Telephone Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
            <tr>
                <th scope="row" class="text-center">{{ $customer->id }}</th>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->telephone_number }}</td>
                <td>
                    <a href="{{ route('customer.show', $customer['id']) }}" class="btn btn-dark">Show</a>
                    <a href="{{ route('customer.edit', $customer['id']) }}" class="btn btn-dark">Edit</a>
                    <a href="{{ route('customer.destroy', $customer['id']) }}" class="btn btn-dark">Delete</a>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('customer.create') }}" class="btn btn-dark">+ Create</a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<br>
@endsection