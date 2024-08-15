<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;
use App\Http\Resources\GoodResource;
use Illuminate\Support\Facades\Cache;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goods = Cache::remember('goods', 60 * 60, function () {
            return Good::with('images')->get();
        });
        return GoodResource::collection($goods);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cacheKey = "good_{$id}";
        $good = Cache::remember($cacheKey, 60 * 60, function () use ($id) {
            $good = Good::findOrFail($id);
            return $good->load('extensions', 'images');
        });
        return new GoodResource($good);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Good $good)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Good $good)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Good $good)
    {
        //
    }
}
