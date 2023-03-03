@extends('layout.nav')
@section('contant')
    <div class="container col-8">
        @if (Session::has("done"))
        <div class="alert alert-success" role="alert">
            {{ Session::get("done") }}
        </div>
    @endif
        <div class="card mt-5">
            <h1 class="text-center mt-3">list Product</h1>
            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Descrption</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th colspan="3" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($producte as $items)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $items->id }}</td>
                                <td>{{ $items->name }}</td>
                                <td>{{ $items->desc }}</td>
                                <td>{{ $items->code }}</td>
                                <td>{{ $items->price }}</td>
                                <td>
                                    <td><a href="{{ route('proshow',[$items->id]) }}" class="btn btn-danger">show</a></td>
                                    <td><a href="{{ route('proedit',[$items->id]) }}" class="btn btn-danger">edit</a></td>
                                    <form action="{{ route('prodestore',$items->id) }}">
                                        @csrf
                                        @method("DELETE")
                                        <td><a href="{{ route('prodestore',[$items->id]) }}" class="btn btn-danger">delete</a></td>
                                    </form>
                                </td>
                            <tr>
                            @empty
                                <div class="alart alart-danger">
                                    <h1>dont there items</h1>
                                </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
