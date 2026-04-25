@extends('layouts.admin')

@section('content')
<section>
    <div class="mb-6">
        <h1 class="font-heading text-[38px] text-[#4D371F]">Edit Course</h1>
        <p class="mt-1 text-sm text-[#8A7060]">Perbarui data course yang sudah ada.</p>
    </div>

    <form method="POST" action="{{ route('admin.courses.update', $course) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('pages.admin.courses._form', ['course' => $course])
    </form>
</section>
@endsection