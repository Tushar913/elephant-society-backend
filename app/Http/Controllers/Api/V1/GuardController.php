<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Guard;
use App\Traits\HasStoreFile;
use Illuminate\Http\Request;

class GuardController extends Controller
{
    use HasStoreFile;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $guards = Guard::with(["society", "wing"])
            ->search($search)
            ->latest()->paginate($perPage);

        return response()->json($guards);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Guard::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Guard $guard) {
        return $guard->loadMissing(["society", "wing"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guard $guard) {
        $guard->update($request->all());
        return $guard;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guard $guard) {
        return $guard->delete();
    }

    public function createOrUpdateGuard(Request $request, Guard $guard = new Guard()) {
        $guard->fill($request->except(["photo"]));

        if ($request->hasFile('photo')) {
            $guard->photo = $this->storeFile($request, "photo", "photos");
        }

        $guard->save();
        return $guard;
    }
}
