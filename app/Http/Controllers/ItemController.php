<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function index()
    {

        return Inertia::render('Item/Index', [
            'items' => Item::all(),
            // only loaded when required
            'sectors' => Inertia::lazy(fn () => ['a', 'b', 'c']),

        ]);
    }
}
