@extends('layout.nav')
@section('contant')
<div class="container col-4">
    <div class="card mt-5">
        <h1 class=" card-title text-center mt-3">show item : {{ $shopro -> id }} </h1>
        <div class="card-body bg-dark">
            <h3>Name:<span> {{ $shopro -> name }}</span></h3>
            <h3>Descrption:<span> {{ $shopro -> desc }}</span></h3>
            <h3>Code:<span> {{ $shopro -> code }}</span></h3>
            <h3>Price:<span> {{ $shopro -> price }}</span></h3>
        </div>
    </div>
</div>
@endsection
