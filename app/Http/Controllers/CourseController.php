<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseOrder;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query()->where('is_active', true);

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
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
            default:
                $query->latest();
                break;
        }

        $courses = $query->paginate(8)->withQueryString();

        $steps = [
            [
                'number' => '1',
                'title' => 'Pilih / Login',
                'desc' => 'Pilih kursus yang Anda minati lalu masuk ke akun Sipilsaku Anda.',
                'icon' => 'assets/icon/icon-login-orange.png',
            ],
            [
                'number' => '2',
                'title' => 'Checkout',
                'desc' => 'Periksa detail pesanan dan pastikan data akun Anda sudah sesuai.',
                'icon' => 'assets/icon/icon-cart.png',
            ],
            [
                'number' => '3',
                'title' => 'Konfirmasi WA',
                'desc' => 'Lanjutkan pembayaran dan kirim pesanan Anda ke admin melalui WhatsApp.',
                'icon' => 'assets/icon/icon-wa.png',
            ],
            [
                'number' => '4',
                'title' => 'Kelas Saya',
                'desc' => 'Setelah diverifikasi, akses kursus Anda akan tersedia di dashboard pelanggan.',
                'icon' => 'assets/icon/icon-bookmark.png',
            ],
        ];

        $isLoggedIn = auth()->check();
        $isAdmin = $isLoggedIn && auth()->user()->role === '1';

        $myCourseOrders = collect();

        if ($isAdmin) {
            $allCourses = Course::with([
                'videos' => function ($query) {
                    $query->where('is_active', true)->orderBy('sort_order');
                },
            ])
                ->where('is_active', true)
                ->latest()
                ->get();

            $myCourseOrders = $allCourses->map(function ($course, $index) {
                return (object) [
                    'id' => 'admin-' . $course->id . '-' . $index,
                    'course' => $course,
                    'access_granted' => true,
                    'payment_status' => 'paid',
                ];
            });
        } elseif ($isLoggedIn) {
            $myCourseOrders = CourseOrder::with([
                'course.videos' => function ($query) {
                    $query->where('is_active', true)->orderBy('sort_order');
                },
            ])
                ->where('user_id', auth()->id())
                ->latest()
                ->get();
        }

        return view('pages.course.index', compact(
            'courses',
            'steps',
            'isLoggedIn',
            'isAdmin',
            'myCourseOrders'
        ));
    }

    public function show(string $slug)
    {
        $course = Course::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.course.show', compact('course'));
    }
}