<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\MaintainceTemplate;
use Illuminate\Http\Request;

class MaintainceTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $maintainceTemplates = MaintainceTemplate::with("society")
            ->search($search)
            ->latest()->paginate($perPage);
        return response()->json($maintainceTemplates);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return MaintainceTemplate::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(MaintainceTemplate $maintainanceTemplate) {
        return $maintainanceTemplate->loadMissing("society");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaintainceTemplate $maintainanceTemplate) {
        $maintainanceTemplate->update($request->all());
        return $maintainanceTemplate;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaintainceTemplate $maintainanceTemplate) {
        return $maintainanceTemplate->delete();
    }
}
