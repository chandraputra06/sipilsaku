@extends('layouts.admin')

@section('content')
<section>
    <div class="mb-6">
        <h1 class="font-heading text-[38px] text-[#4D371F]">Tambah Course</h1>
        <p class="mt-1 text-sm text-[#8A7060]">Tambahkan data course baru untuk Sipilsaku.</p>
    </div>

    <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
        @csrf
        @include('pages.admin.courses._form')
    </form>
</section>
@endsection