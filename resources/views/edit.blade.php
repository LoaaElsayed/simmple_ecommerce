@extends('layout.nav')
@section('contant')
    <div class="container col-6">
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
            <h1 class="text-center mt-3">Edite Product : {{ $prod->name }}</h1>
            <div class="card-body">
                <form action="{{ route('proupdate', $prod->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name Product</label>
                        <input type="text" class="form-control" name="name" placeholder="name"
                            value="{{ $prod->name }}">
                    </div>
                    <div class="form-group">
                        <label>Descrption for Product</label>
                        <input type="text" class="form-control" name="desc"
                            placeholder="product is good and component" value="{{ $prod->desc }}">
                    </div>
                    <div class="form-group">
                        <label>Code Product</label>
                        <input type="text" class="form-control" name="code" placeholder="#dd45"
                            value="{{ $prod->code }}">
                    </div>
                    <div class="form-group">
                        <label>Price Product</label>
                        <input type="text" class="form-control" name="price" placeholder="5000"
                            value="{{ $prod->price }}">
                    </div>
                    <button class="btn btn-success col-2">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
