<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Commitie;
use Illuminate\Http\Request;

class CommitieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $commities = Commitie::with(["society", "wing", "owner"])
            ->search($search)
            ->latest()->paginate($perPage);

        return response()->json($commities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Commitie::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Commitie $commity) {
        return $commity->loadMissing(["society", "wing", "owner"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commitie $commity) {
        $commity->update($request->all());
        return $commity;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commitie $commity) {
        return $commity->delete();
    }
}
