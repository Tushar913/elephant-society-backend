<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Society;
use App\Traits\HasStoreFile;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    use HasStoreFile;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $searchTerm = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $societies = Society::with(["owners", "wings"])
            // local query scope
            ->search($searchTerm)
            ->latest()->paginate($perPage);

        return response()->json($societies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return $this->createOrUpdateSociety($request);
    }

    /**
     * @param  Request  $request
     * @param  Society  $society
     * @return Society
     */
    protected function createOrUpdateSociety(Request $request, Society $society = new Society()): Society {
        $society->fill($request->except("logo"));

        if ($request->hasFile('logo')) {
            $society->logo = $this->storeFile($request, "logo", "logos");
        }

        $society->save();
        return $society;
    }

    /**
     * Display the specified resource.
     */
    public function show(Society $society) {
        return $society->loadMissing(["wings", "owners"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Society $society) {
        return $this->createOrUpdateSociety($request, $society);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Society $society) {
        return $society->delete();
    }
}
