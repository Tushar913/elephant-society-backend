<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\VisitorManagement;
use Illuminate\Http\Request;

class VisitorManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return VisitorManagement::query()->latest()->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return $this->createOrUpdateVisitor($request);
    }

    protected function createOrUpdateVisitor(
        Request $request,
        VisitorManagement $visitorManagement = new VisitorManagement()
    ): VisitorManagement {
        $visitorManagement->fill($request->except(["profile"]));

        if ($request->hasFile('profile')) {
            $visitorManagement->photo = $this->storeFile($request, "profile");
        }

        $visitorManagement->save();
        return $visitorManagement;
    }

    /**
     * Display the specified resource.
     */
    public function show(VisitorManagement $visitorManagement) {
        return $visitorManagement;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisitorManagement $visitorManagement) {
        return $this->createOrUpdateVisitor($request, $visitorManagement);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisitorManagement $visitorManagement) {
        return $visitorManagement->delete();
    }
}
