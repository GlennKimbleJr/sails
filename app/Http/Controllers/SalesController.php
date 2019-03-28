<?php

namespace App\Http\Controllers;

use App\Boat;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Boat $boat
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Boat $boat)
    {
        $boat->generateQuote();
    }
}
