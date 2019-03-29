@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <div class="row">
                        <div class="col-md-6">
                            {{ $boat->year }} {{ $boat->make }} {{ $boat->model }}
                        </div>

                        <div class="col-md-6 text-md-right">
                            {{ $boat->list_price_in_dollars }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('sales.store', $boat) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="price">Sale Price:</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') ?? $boat->list_price_in_dollars }}">
                            <div class="text-danger">{{ $errors->first('price') }}</div>
                        </div>

                        <div class="row my-3">
                            <div class="col-6">
                                <label for="customers">Customer(s):</label>
                                <input type="hidden" name="customers">
                                <div class="text-danger">{{ $errors->first('customers') }}</div>
                            </div>

                            <div class="col-6 text-right">
                                <button class="btn btn-sm btn-primary" type="button" id="addCustomerBtn">
                                    Add Customer
                                </button>
                            </div>
                        </div>

                        <table class="table table-condensed table-hover table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($customers as $customer)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="customers[{{ $customer->id }}]" value="{{ $customer->id }}">
                                    </td>
                                    <td>{{ $customer->first_name }}</td>
                                    <td>{{ $customer->last_name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <hr>

                        <button class="btn btn-block btn-success">Generate Invoice</button>
                    </form>
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
