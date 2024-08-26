<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Traits\HasStoreFile;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    use HasStoreFile;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $expenses = Expense::with(["society", "wing"])
            ->search($search)
            ->latest()->paginate($perPage);

        return response()->json($expenses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Expense::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense) {
        return $expense->loadMissing(["society", "wing"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense) {
        $expense->update($request->all());
        return $expense;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense) {
        return $expense->delete();
    }

    public function createOrUpdateExpense(Request $request, Expense $expense = new Expense()) {
        $expense->fill($request->except(["photo"]));

        if ($request->hasFile('photo')) {
            $expense->photo = $this->storeFile($request, "photo", "expenses");
        }

        $expense->save();
        return $expense;
    }
}
