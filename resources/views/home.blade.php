@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header bg-secondary text-white">Customers</div>
                <div class="card-body">
                    <a class="btn btn-block btn-light" href="#">View</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header bg-primary text-white">Inventory</div>
                <div class="card-body">
                    <a class="btn btn-block btn-light" href="#">View</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header bg-success text-white">Sales</div>
                <div class="card-body">
                    <a class="btn btn-block btn-light" href="#">View</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
