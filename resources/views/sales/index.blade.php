@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="quoted-tab" data-toggle="tab" href="#quoted" role="tab" aria-controls="quoted" aria-selected="true">Quoted</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="delivered-tab" data-toggle="tab" href="#delivered" role="tab" aria-controls="delivered" aria-selected="false">Delivered</a>
                </li>
            </ul>

            <div class="card p-3">
                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="quoted" role="tabpanel" aria-labelledby="quoted-tab">
                        @include ('sales._table', ['sales' => $quoted_sales])
                    </div>

                    <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                        @include ('sales._table', ['sales' => $pending_sales])
                    </div>

                    <div class="tab-pane fade" id="delivered" role="tabpanel" aria-labelledby="delivered-tab">
                        @include ('sales._table', ['sales' => $delivered_sales])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
