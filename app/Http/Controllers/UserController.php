<?php

namespace App\Http\Controllers;

use App\Models\CourseOrder;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::withCount('courseOrders')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.admin.users.index', compact('users'));
    }

    public function show(User $user): View
    {
        $user->load(['courseOrders.course']);

        return view('pages.admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('pages.admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['required', 'in:1,2'],
            'whatsapp' => ['nullable', 'string', 'max:30'],
            'profession' => ['nullable', 'string', 'max:100'],
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function updateCourseAccess(Request $request, User $user, CourseOrder $courseOrder): RedirectResponse
    {
        if ($courseOrder->user_id !== $user->id) {
            abort(404);
        }

        $validated = $request->validate([
            'payment_status' => ['required', 'in:pending,paid,cancelled'],
            'access_granted' => ['nullable', 'boolean'],
        ]);

        $courseOrder->payment_status = $validated['payment_status'];
        $courseOrder->access_granted = $request->boolean('access_granted');

        if ($validated['payment_status'] === 'paid' && !$courseOrder->paid_at) {
            $courseOrder->paid_at = now();
        }

        if ($request->boolean('access_granted') && !$courseOrder->access_granted_at) {
            $courseOrder->access_granted_at = now();
        }

        if (!$request->boolean('access_granted')) {
            $courseOrder->access_granted_at = null;
        }

        $courseOrder->save();

        return redirect()->route('admin.users.show', $user)->with('success', 'Akses course user berhasil diperbarui.');
    }
}
