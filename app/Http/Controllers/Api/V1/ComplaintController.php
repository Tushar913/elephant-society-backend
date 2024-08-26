<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Traits\HasStoreFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    use HasStoreFile;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $user = Auth::user();
        $query = Complaint::query()->with(["society", "wing", "owner", "tenant"]);

        if ($user->role == 'user') {
            $query = $query->where("society_id", $user->owner->society_id);
        }

        $complaints = $query->search($search)
            ->latest()->paginate($perPage);

        return response()->json($complaints);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return $this->createOrUpdateComplaint($request);
    }

    protected function createOrUpdateComplaint(Request $request, Complaint $complaint = new Complaint()): Complaint {
        $complaint->fill($request->except("photo"));

        if ($request->hasFile('photo')) {
            $complaint->photo = $this->storeFile($request, "photo", "complaints");
        }

        $complaint->save();
        return $complaint;
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint) {
        $complaint->loadMissing(["society", "wing", "owner", "tenant"]);
        return $complaint;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complaint $complaint) {
        return $this->createOrUpdateComplaint($request, $complaint);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint) {
        return $complaint->delete();
    }
}
