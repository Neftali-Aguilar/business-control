<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GeneralController extends Controller
{

    public function index()
    {
        return Inertia::render('Frontend/Home', [
            'name' => 'Crypto'
        ]);
    }

}
