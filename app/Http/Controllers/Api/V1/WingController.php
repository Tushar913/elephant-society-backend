<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Wing;
use Illuminate\Http\Request;

class WingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $searchTerm = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $wings = Wing::with(["society", "owners"])
            // local query scope
            ->search($searchTerm)
            ->latest()->paginate($perPage);

        return response()->json($wings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Wing::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Wing $wing) {
        return $wing->loadMissing(["owners", "society"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wing $wing) {
        $wing->update($request->all());
        return $wing;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wing $wing) {
        return $wing->delete();
    }
}
