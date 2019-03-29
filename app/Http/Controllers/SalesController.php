<?php

namespace App\Http\Controllers;

use App\Boat;
use App\Sale;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSaleRequest;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::orderByDesc('created_at')->get();

        return view('sales.index', [
            'quoted_sales' => $sales->quoted(),
            'pending_sales' => $sales->pending(),
            'delivered_sales' => $sales->delivered(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Boat $boat
     * @return \Illuminate\Http\Response
     */
    public function create(Boat $boat)
    {
        return view('boats.purchase', [
            'boat' => $boat,
            'customers' => Customer::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateSaleRequest $request
     * @param  \App\Boat $boat
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSaleRequest $request, Boat $boat)
    {
        $sale = $boat->generateQuote($request->price)->for($request->customers);

        return redirect()->to(route('sales.show', $sale));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('sales.show', [
            'sale' => $sale->loadMissing(['boat', 'customers']),
        ]);
    }
}
