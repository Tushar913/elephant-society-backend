<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $assets = Asset::with(["owner", "society", "wing"])
            ->search($search)
            ->latest()->paginate($perPage);

        return response()->json($assets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Asset::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset) {
        return $asset->loadMissing(["society", "wing", "owner"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset) {
        $asset->update($request->all());
        return $asset;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset) {
        return $asset->delete();
    }
}
