@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-8">
            <div class="card mb-3">
                <div class="card-header bg-secondary text-white">
                    <div class="row">
                        <div class="col-md-6">
                            {{ $sale->boat->year }} {{ $sale->boat->make }} {{ $sale->boat->model }}
                        </div>

                        <div class="col-md-6 text-md-right">
                            {{ $sale->price_in_dollars }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h2>Status: {{ ucwords($sale->status) }}</h2>
                            <a class="btn btn-lg btn-secondary m-4" href="#">View Invoice</a>
                        </div>

                        <div class="col-md-6 text-md-right">
                            Item:<br>
                            <a href="{{ route('boats.show', $sale->boat) }}">
                                {{ $sale->boat->year }} {{ $sale->boat->make }} {{ $sale->boat->model }}
                            </a><br>

                            <br>
                            Customer(s):<br>
                            @foreach ($sale->customers as $customer)
                                <a href="">{{ $customer->full_name }}</a><br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-condensed table-striped table-hover border">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Quoted</td>
                        <td>{{ $sale->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Pending</td>
                        <td>{{ $sale->sold_at }}</td>
                    </tr>
                    <tr>
                        <td>Delivered (Complete)</td>
                        <td>{{ $sale->delivered_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
