@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    {{ $boat->name }}
                </div>
                <div class="card-body row">
                    <div class="col-md-6">
                        <img src="/boat.jpg" class="img-fluid mb-3">
                    </div>

                    <div class="col-md-6">
                        <h1 class="text-center text-md-left">{{ $boat->list_price_in_dollars }}</h1>
                        <p>Serial No: {{ $boat->serial_number }}</p>
                        <p>Stock No: {{ $boat->stock_number }}</p>

                        @if ($boat->equipment->count())
                            <p>Equipment List:</p>
                            <ul>
                                @foreach($boat->equipment as $equipment)
                                    <li>{{ $equipment->name }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <hr>
                        <a class="btn btn-block btn-success" href="{{ route('sales.create', $boat) }}">Purchase</a>
                    </div>
                </div>
            </div>

            <button class="btn btn-secondary mt-3" id="goBackBtn">Go Back</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#goBackBtn').on('click', function () {
        window.history.back();
    })
</script>
@endsection
