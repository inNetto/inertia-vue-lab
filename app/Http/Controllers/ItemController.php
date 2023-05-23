<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function index()
    {
        return Inertia::render('Item/Index', [
            'items' => ['t-shirt', 'shoes', 'bottles'],
            // only loaded when required
            'sectors' => Inertia::lazy(fn () => ['a', 'b', 'c']),
        ]);
    }
}
