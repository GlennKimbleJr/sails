<?php

namespace App\Http\Controllers;

use App\Boat;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSaleRequest;

class SalesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $boat->generateQuote($request->price)->for($request->customers);
    }
}
