<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;

class PlantController extends Controller
{
    public function view()
    {
        $plant = Plant::all();
        return view('/produk/view', compact('plant'));
    }
}
