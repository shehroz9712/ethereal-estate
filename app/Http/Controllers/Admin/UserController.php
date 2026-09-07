<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        protected UserRepositoryInterface $userRepo
    ) {}

    public function index(Request $request): View
    {
        $filters = $request->only(['role', 'search']);
        $users = $this->userRepo->getAll($filters, 15);

        return view('admin.users.index', compact('users', 'filters'));
    }

    public function updateRole(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'role' => 'required|in:admin,user',
        ]);

        if ($user->id === auth()->id() && $request->role !== 'admin') {
            return back()->with('error', 'You cannot revoke your own administrator privileges.');
        }

        $this->userRepo->update($user, ['role' => $request->role]);

        return back()->with('success', "Role for user '{$user->name}' updated to '{$request->role}'.");
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account while logged in.');
        }

        $this->userRepo->delete($user);

        return back()->with('success', "User '{$user->name}' deleted successfully.");
    }
}
