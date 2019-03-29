@extends('layouts.app')

@section('content')
<div class="container">
    @forelse ($boats as $boat)
    <div class="row justify-content-center mb-3">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    {{ $boat->name }}
                </div>
                <div class="card-body row">
                    <div class="col-md-6">
                        <img src="boat.jpg" class="img-fluid">
                    </div>

                    <div class="col-md-6 text-center text-md-right">
                        <h1 class="p-2">{{ $boat->list_price_in_dollars }}</h1>
                        <a class="btn btn-block btn-primary" href="{{ route('boats.show', $boat) }}">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
        <h1>Sorry! There are no boats available at this time.</h1>
    @endforelse

    <div class="row justify-content-center mb-3">
        <div class="col-8">
            {{ $boats->links() }}
        </div>
    </div>
</div>
@endsection
