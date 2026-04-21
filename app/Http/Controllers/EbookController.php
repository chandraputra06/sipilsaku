<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function index(Request $request)
    {
        $query = Ebook::query()->where('is_active', true);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
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

        $ebooks = $query->paginate(8)->withQueryString();

        $popularEbooks = Ebook::where('is_active', true)
            ->where('is_popular', true)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.ebook.index', compact('ebooks', 'popularEbooks'));
    }

    public function show(string $slug)
    {
        $ebook = Ebook::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.ebook.show', compact('ebook'));
    }
}