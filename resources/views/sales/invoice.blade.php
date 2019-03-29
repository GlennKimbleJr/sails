<h1>Invoice #{{ $sale->id }}</h1>
<p>Item: {{ $sale->boat->name }}</p>
<p>Quoted On: {{ $sale->created_at }}</p>
<h3>Amount Due: {{ $sale->price_in_dollars }}</h3>
<br>
________________________<br>
(Customer Signature)<br>
<br>

________________________<br>
(Date)<br>
<br>
