<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\HasStoreFile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use HasStoreFile;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $search = $request->query("search");
        $perPage = $request->query("perPage") ?? 10;

        $users = User::query()
            ->search($search)
            ->latest()->paginate($perPage);

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return $this->createOrUpdateUser($request);
    }

    protected function createOrUpdateUser(Request $request, User $user = new User()): User {
        $user->fill($request->except(["photo"]));

        if ($request->hasFile('photo')) {
            $user->photo = $this->storeFile($request, "photo", "photos");
        }

        $user->save();
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) {
        return $this->createOrUpdateUser($request, $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) {
        return $user->delete();
    }
}
