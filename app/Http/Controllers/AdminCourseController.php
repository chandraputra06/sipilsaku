<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminCourseController extends Controller
{
    public function index(Request $request): View
    {
        $courses = Course::when($request->filled('search'), function ($query) use ($request) {
            $query->where('title', 'like', '%' . $request->search . '%');
        })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.admin.courses.index', compact('courses'));
    }

    public function create(): View
    {
        return view('pages.admin.courses.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'description' => ['nullable', 'string'],
            'badges' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('courses', 'public');
        }

        $badges = collect(explode(',', $request->badges))
            ->map(fn($item) => trim($item))
            ->filter()
            ->values()
            ->all();

        $validated['badges'] = $badges;
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']) . '-' . time();
        $validated['is_active'] = $request->boolean('is_active');

        Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course berhasil ditambahkan.');
    }

    public function edit(Course $course): View
    {
        return view('pages.admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'description' => ['nullable', 'string'],
            'badges' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'session_total' => ['nullable', 'string', 'max:255'],
            'session_label' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'], 
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($course->thumbnail && \Illuminate\Support\Facades\Storage::disk('public')->exists($course->thumbnail)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($course->thumbnail);
            }

            $validated['thumbnail'] = $request->file('thumbnail')->store('courses', 'public');
        }

        $badges = collect(explode(',', $request->badges))
            ->map(fn($item) => trim($item))
            ->filter()
            ->values()
            ->all();

        $validated['badges'] = $badges;
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']) . '-' . $course->id;
        $validated['is_active'] = $request->boolean('is_active');

        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course berhasil diperbarui.');
    }

    public function destroy(Course $course): RedirectResponse
    {
        if ($course->thumbnail && Storage::disk('public')->exists($course->thumbnail)) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course berhasil dihapus.');
    }
}
