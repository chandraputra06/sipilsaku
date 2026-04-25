<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminCourseVideoController extends Controller
{
    public function index(Course $course): View
    {
        $videos = $course->videos()->latest('sort_order')->paginate(10);

        return view('pages.admin.course-videos.index', compact('course', 'videos'));
    }

    public function create(Course $course): View
    {
        return view('pages.admin.course-videos.create', compact('course'));
    }

    public function store(Request $request, Course $course): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'duration' => ['nullable', 'string', 'max:100'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'youtube_url' => ['required', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('course-videos', 'public');
        }

        $validated['course_id'] = $course->id;
        $validated['sort_order'] = $validated['sort_order'] ?? 1;
        $validated['is_active'] = $request->boolean('is_active');

        CourseVideo::create($validated);

        return redirect()
            ->route('admin.courses.videos.index', $course)
            ->with('success', 'Video berhasil ditambahkan.');
    }

    public function edit(CourseVideo $video): View
    {
        $course = $video->course;

        return view('pages.admin.course-videos.edit', compact('course', 'video'));
    }

    public function update(Request $request, CourseVideo $video): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'duration' => ['nullable', 'string', 'max:100'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'youtube_url' => ['required', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($video->thumbnail && Storage::disk('public')->exists($video->thumbnail)) {
                Storage::disk('public')->delete($video->thumbnail);
            }

            $validated['thumbnail'] = $request->file('thumbnail')->store('course-videos', 'public');
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 1;
        $validated['is_active'] = $request->boolean('is_active');

        $video->update($validated);

        return redirect()
            ->route('admin.courses.videos.index', $video->course)
            ->with('success', 'Video berhasil diperbarui.');
    }

    public function destroy(CourseVideo $video): RedirectResponse
    {
        $course = $video->course;

        if ($video->thumbnail && Storage::disk('public')->exists($video->thumbnail)) {
            Storage::disk('public')->delete($video->thumbnail);
        }

        $video->delete();

        return redirect()
            ->route('admin.courses.videos.index', $course)
            ->with('success', 'Video berhasil dihapus.');
    }
}