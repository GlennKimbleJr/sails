<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SalesInvoiceController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return App::make('dompdf.wrapper')->loadView('sales.invoice', [
            'sale' => $sale,
        ])->stream();
    }
}
