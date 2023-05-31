<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function index()
    {

        return Inertia::render('Item/Index', [
            'items' => Item::all(),
            'sectors' => Inertia::lazy(fn () => ['a', 'b', 'c']),
        ]);
    }

    public function create()
    {
        return Inertia::render('Item/Create');
    }

    public function store(ItemRequest $request)
    {
        $item = Item::create($request->validated());
        $item->save();
    }
}
