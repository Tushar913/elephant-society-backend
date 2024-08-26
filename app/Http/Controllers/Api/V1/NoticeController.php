<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Traits\HasStoreFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    use HasStoreFile;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $user = Auth::user();
        $query = Notice::query()->with(["society", "wing"]);

        if ($user->role == 'user') {
            $query = $query->where("society_id", $user->owner->society_id);
        }

        $notices = $query->search($search)
            ->latest()->paginate($perPage);

        return response()->json($notices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Notice::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice) {
        return $notice->loadMissing(["society", "wing"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice) {
        $notice->update($request->all());
        return $notice;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice) {
        return $notice->delete();
    }
}
