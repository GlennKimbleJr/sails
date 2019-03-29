<?php

namespace App\Http\Controllers;

use App\Boat;
use Illuminate\Http\Request;

class BoatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('boats.index', [
            'boats' => Boat::paginate(10),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boat $boat
     * @return \Illuminate\Http\Response
     */
    public function show(Boat $boat)
    {
        return view('boats.show', [
            'boat' => $boat,
        ]);
    }
}
