<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Traits\HasStoreFile;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    use HasStoreFile;

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Visitor::query()->latest()->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return $this->createOrUpdateVisitor($request);
    }

    protected function createOrUpdateVisitor(Request $request, Visitor $visitor = new Visitor()): Visitor {
        $visitor->fill($request->except(["photo"]));

        if ($request->hasFile('photo')) {
            $visitor->photo = $this->storeFile($request, "photo", "photos");
        }

        $visitor->save();
        return $visitor;
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitor $visitor) {
        return $visitor;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitor $visitor) {
        return $this->createOrUpdateVisitor($request, $visitor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitor $visitor) {
        return $visitor->delete();
    }
}
