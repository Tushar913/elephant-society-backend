<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $user = Auth::user();
        $query = Invoice::query()->with(["society", "wing", "maintainance"]);

        if ($user->role == 'user') {
            $query = $query->where("owner_id", $user->owner_id);
        }

        $invoices = $query->search($search)
            ->latest()->paginate($perPage);

        return response()->json($invoices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Invoice::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice) {
        return $invoice->loadMissing(["society", "wing", "owner", "maintainance"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice) {
        $invoice->update($request->all());
        return $invoice;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice) {
        return $invoice->delete();
    }
}
