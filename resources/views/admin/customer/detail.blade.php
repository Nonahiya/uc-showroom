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
                <td>{{ $customer->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $customer->name }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $customer->address }}</td>
            </tr>
            <tr>
                <th>Telephone Number</th>
                <td>{{ $customer->telephone_number }}</td>
            </tr>
            @endif
        </table>
    </div>
@endsection
