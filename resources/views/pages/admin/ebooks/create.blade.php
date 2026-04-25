@extends('layouts.admin')

@section('content')
<section>
    <div class="mb-6">
        <h1 class="font-heading text-[38px] text-[#4D371F]">Tambah E-Book</h1>
        <p class="mt-1 text-sm text-[#8A7060]">Tambahkan data e-book baru untuk Sipilsaku.</p>
    </div>

    <form method="POST" action="{{ route('admin.ebooks.store') }}" enctype="multipart/form-data">
        @csrf
        @include('pages.admin.ebooks._form')
    </form>
</section>
@endsection