@extends('layout.nav')
@section('contant')
    <div class="container col-6">
        @if (Session::has('done'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('done') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-primary mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card mt-5">
            <h1 class="text-center mt-3">Add Product</h1>
            <div class="card-body">
                <form action="{{ route('prostore') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name Product</label>
                        <input type="text" class="form-control" name="name" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label>Descrption for Product</label>
                        <input type="text" class="form-control" name="desc"
                            placeholder="product is good and component">
                    </div>
                    <div class="form-group">
                        <label>Code Product</label>
                        <input type="text" class="form-control" name="code" placeholder="#dd45">
                    </div>
                    <div class="form-group">
                        <label>Price Product</label>
                        <input type="text" class="form-control" name="price" placeholder="5000">
                    </div>
                    <button class="btn btn-info col-2">send</button>
                </form>

            </div>
        </div>
    </div>
@endsection
