<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Traits\HasStoreFile;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    use HasStoreFile;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $owners = Owner::with(["users", "society", "wing"])
            ->search($search)
            ->latest()->paginate($perPage);

        return response()->json($owners);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return $this->createOrUpdateOwner($request);
    }

    protected function createOrUpdateOwner(Request $request, Owner $owner = new Owner()): Owner {
        $owner->fill($request->except(["photo", "agreement"]));

        if ($request->hasFile('photo')) {
            $owner->photo = $this->storeFile($request, "photo", "photos");
        }

        if ($request->hasFile("agreement")) {
            $owner->agreement = $this->storeFile($request, "agreement", "agreements");
        }

        $owner->save();
        return $owner;
    }


    /**
     * Display the specified resource.
     */
    public function show(Owner $owner) {
        return $owner->load(["society", "wing", "users"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner) {
        return $this->createOrUpdateOwner($request, $owner);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner) {
        return $owner->delete();
    }
}
