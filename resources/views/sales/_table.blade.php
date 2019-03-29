<table class="table table-condensed table-striped table-hover">
    <thead>
        <tr>
            <th>Date</th>
            <th>Price</th>
            <th>Item</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
        <tr>
            <td>{{ $sale->created_at }}</td>
            <td>{{ $sale->price_in_dollars }}</td>
            <td>{{ $sale->boat->name }}</td>
            <td class="text-right">
                <a href="{{ route('sales.show', $sale) }}" class="btn btn-sm btn-dark">
                    View
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
