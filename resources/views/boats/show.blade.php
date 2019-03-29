@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    {{ $boat->year }} {{ $boat->make }} {{ $boat->model }}
                </div>
                <div class="card-body row">
                    <div class="col-md-6">thumbnail</div>
                    <div class="col-md-6">
                        <h1>{{ $boat->list_price_in_dollars }}</h1>
                        <p>Serial No: {{ $boat->serial_number }}</p>
                        <p>Stock No: {{ $boat->stock_number }}</p>

                        <hr>
                        <a class="btn btn-block btn-success" href="{{ route('sales.create', $boat) }}">Purchase</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
