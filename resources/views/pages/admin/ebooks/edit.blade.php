@extends('layouts.app-no-footer')

@section('content')
<section class="bg-[#FCF5EE] py-10">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
        <div class="mb-6">
            <h1 class="font-heading text-[38px] text-[#4D371F]">Edit E-Book</h1>
            <p class="mt-1 text-sm text-[#8A7060]">
                Perbarui data e-book yang sudah ada.
            </p>
        </div>

        <form method="POST" action="{{ route('admin.ebooks.update', $ebook) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('pages.admin.ebooks._form', ['ebook' => $ebook])
        </form>
    </div>
</section>
@endsection