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
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        switch ($request->get('sort')) {
            case 'nama':
                $query->orderBy('title', 'asc');
                break;
            case 'termahal':
                $query->orderBy('price', 'desc');
                break;
            case 'termurah':
                $query->orderBy('price', 'asc');
                break;
            case 'semua':
            case 'terbaru':
            default:
                $query->latest();
                break;
        }

        $ebooks = $query->paginate(8)->withQueryString();

        $popularEbooks = Ebook::where('is_active', true)->where('is_popular', true)->latest()->take(3)->get();

        return view('pages.ebook.index', compact('ebooks', 'popularEbooks'));
    }
}
