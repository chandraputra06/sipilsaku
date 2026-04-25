<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminEbookController extends Controller
{
    public function index(Request $request): View
    {
        $ebooks = Ebook::when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('author', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.admin.ebooks.index', compact('ebooks'));
    }

    public function create(): View
    {
        return view('pages.admin.ebooks.create');
    }

    public function store(Request $request): RedirectResponse
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

        return redirect()
            ->route('admin.ebooks.index')
            ->with('success', 'E-Book berhasil ditambahkan.');
    }

    public function edit(Ebook $ebook): View
    {
        return view('pages.admin.ebooks.edit', compact('ebook'));
    }

    public function update(Request $request, Ebook $ebook): RedirectResponse
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

        return redirect()
            ->route('admin.ebooks.index')
            ->with('success', 'E-Book berhasil diperbarui.');
    }

    public function destroy(Ebook $ebook): RedirectResponse
    {
        if ($ebook->cover && Storage::disk('public')->exists($ebook->cover)) {
            Storage::disk('public')->delete($ebook->cover);
        }

        $ebook->delete();

        return redirect()
            ->route('admin.ebooks.index')
            ->with('success', 'E-Book berhasil dihapus.');
    }
}