<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query()->where('is_active', true);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('sort')) {
            if ($request->sort === 'nama') {
                $query->orderBy('title', 'asc');
            } elseif ($request->sort === 'terbaru') {
                $query->latest();
            } elseif ($request->sort === 'termahal') {
                $query->orderBy('price', 'desc');
            } elseif ($request->sort === 'termurah') {
                $query->orderBy('price', 'asc');
            } else {
                $query->latest();
            }
        } else {
            $query->latest();
        }

        $courses = $query->paginate(8)->withQueryString();

        return view('pages.course.index', compact('courses'));
    }

    public function show(string $slug)
    {
        $course = Course::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.course.show', compact('course'));
    }
}