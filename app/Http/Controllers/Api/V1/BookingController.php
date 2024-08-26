<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $bookings = Booking::with(["society", "owner", "facility"])
            ->search($search)
            ->latest()->paginate($perPage);

        return response()->json($bookings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Booking::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $facilityBooking) {
        return $facilityBooking->loadMissing(["society", "owner", "facility"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $facilityBooking) {
        $facilityBooking->update($request->all());
        return $facilityBooking;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $facilityBooking) {
        return $facilityBooking->delete();
    }
}
