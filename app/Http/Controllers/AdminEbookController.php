<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminEbookController extends Controller
{
    public function index(Request $request)
    {
        $ebooks = Ebook::when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('author', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('pages.admin.ebooks.index', compact('ebooks'));
    }

    public function create()
    {
        return view('pages.admin.ebooks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'author'      => ['nullable', 'string', 'max:255'],
            'cover'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'description' => ['nullable', 'string'],
            'price'       => ['required', 'numeric', 'min:0'],
            'is_popular'  => ['nullable', 'boolean'],
            'is_active'   => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('ebooks', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']) . '-' . time();
        $validated['is_popular'] = $request->boolean('is_popular');
        $validated['is_active'] = $request->boolean('is_active');

        Ebook::create($validated);

        return redirect()->route('admin.ebooks.index')->with('success', 'E-Book berhasil ditambahkan.');
    }

    public function edit(Ebook $ebook)
    {
        return view('pages.admin.ebooks.edit', compact('ebook'));
    }

    public function update(Request $request, Ebook $ebook)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'author'      => ['nullable', 'string', 'max:255'],
            'cover'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'description' => ['nullable', 'string'],
            'price'       => ['required', 'numeric', 'min:0'],
            'is_popular'  => ['nullable', 'boolean'],
            'is_active'   => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('cover')) {
            if ($ebook->cover && Storage::disk('public')->exists($ebook->cover)) {
                Storage::disk('public')->delete($ebook->cover);
            }

            $validated['cover'] = $request->file('cover')->store('ebooks', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']) . '-' . $ebook->id;
        $validated['is_popular'] = $request->boolean('is_popular');
        $validated['is_active'] = $request->boolean('is_active');

        $ebook->update($validated);

        return redirect()->route('admin.ebooks.index')->with('success', 'E-Book berhasil diperbarui.');
    }

    public function destroy(Ebook $ebook)
    {
        if ($ebook->cover && Storage::disk('public')->exists($ebook->cover)) {
            Storage::disk('public')->delete($ebook->cover);
        }

        $ebook->delete();

        return redirect()->route('admin.ebooks.index')->with('success', 'E-Book berhasil dihapus.');
    }
}