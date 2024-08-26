<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Parking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $user = Auth::user();
        $query = Parking::query()->with("owner");

        if ($user->role == 'user') {
            $query = $query->where("owner_id", $user->owner_id);
        }

        $parkings = $query
            ->search($search)
            ->latest()->paginate($perPage);

        return response()->json($parkings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Parking::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Parking $parking) {
        return $parking->loadMissing("owner");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parking $parking) {
        $parking->update($request->all());
        return $parking;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parking $parking) {
        return $parking->delete();
    }
}
