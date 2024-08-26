<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $facilities = Facility::with("society")
            ->search($search)
            ->latest()->paginate($perPage);

        return response()->json($facilities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Facility::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facilite) {
        return $facilite->loadMissing("society");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facilite) {
        $facilite->update($request->all());
        return $facilite;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facilite) {
        return $facilite->delete();
    }
}
