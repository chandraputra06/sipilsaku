<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function ebook(Request $request, string $slug): View
    {
        $ebook = Ebook::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $qty = max((int) $request->get('qty', 1), 1);
        $subtotal = $ebook->price * $qty;

        return view('pages.ebook.checkout', [
            'ebook' => $ebook,
            'user' => $request->user(),
            'qty' => $qty,
            'subtotal' => $subtotal,
        ]);
    }

    public function ebookWhatsapp(Request $request, string $slug): RedirectResponse
    {
        $ebook = Ebook::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $user = $request->user();

        $validated = $request->validate([
            'qty' => ['required', 'integer', 'min:1'],
        ]);

        $qty = (int) $validated['qty'];
        $subtotal = $ebook->price * $qty;

        $adminPhone = '6281916113700';

        $message = 'Halo Admin Sipilsaku,%0A%0ASaya ingin memesan e-book dengan detail berikut:%0A%0A';
        $message .= "*Nama:* {$user->name}%0A";
        $message .= "*Email:* {$user->email}%0A";
        $message .= '*WhatsApp:* ' . ($user->whatsapp ?: '-') . '%0A';
        $message .= '*Status/Pekerjaan:* ' . ($user->profession ?: '-') . '%0A%0A';
        $message .= "*Produk:* {$ebook->title}%0A";
        $message .= '*Harga Satuan:* Rp ' . number_format($ebook->price, 0, ',', '.') . '%0A';
        $message .= "*Jumlah:* {$qty}%0A";
        $message .= '*Subtotal:* Rp ' . number_format($subtotal, 0, ',', '.') . '%0A%0A';
        $message .= 'Mohon info untuk proses pembayaran selanjutnya. Terima kasih.';

        return redirect()->away("https://wa.me/{$adminPhone}?text={$message}");
    }

    public function course(Request $request, string $slug): View
    {
        $course = \App\Models\Course::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('pages.course.checkout', [
            'course' => $course,
            'user' => $request->user(),
            'subtotal' => $course->price,
        ]);
    }

    public function courseWhatsapp(Request $request, string $slug): RedirectResponse
    {
        $course = \App\Models\Course::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $user = $request->user();
        $subtotal = $course->price;

        $order = \App\Models\CourseOrder::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'qty' => 1,
            'payment_status' => 'pending',
            'access_granted' => false,
        ]);

        $adminPhone = '6281916113700';

        $message = 'Halo Admin Sipilsaku,%0A%0ASaya ingin memesan kursus dengan detail berikut:%0A%0A';
        $message .= "*Order ID:* {$order->id}%0A";
        $message .= "*Nama:* {$user->name}%0A";
        $message .= "*Email:* {$user->email}%0A";
        $message .= '*WhatsApp:* ' . ($user->whatsapp ?: '-') . '%0A';
        $message .= '*Status/Pekerjaan:* ' . ($user->profession ?: '-') . '%0A%0A';
        $message .= "*Produk:* {$course->title}%0A";
        $message .= '*Harga:* Rp ' . number_format($course->price, 0, ',', '.') . '%0A';
        $message .= '*Subtotal:* Rp ' . number_format($subtotal, 0, ',', '.') . '%0A%0A';
        $message .= 'Mohon info untuk proses pembayaran selanjutnya. Terima kasih.';

        return redirect()->away("https://wa.me/{$adminPhone}?text={$message}");
    }
}
