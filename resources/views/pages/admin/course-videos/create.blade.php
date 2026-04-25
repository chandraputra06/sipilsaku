@extends('layouts.admin')

@section('content')
<section>
    <div class="mb-6">
        <h1 class="font-heading text-[38px] text-[#4D371F]">Tambah Video</h1>
        <p class="mt-1 text-sm text-[#8A7060]">Course: {{ $course->title }}</p>
    </div>

    <form method="POST" action="{{ route('admin.courses.videos.store', $course) }}" enctype="multipart/form-data">
        @csrf
        @include('pages.admin.course-videos._form')
    </form>
</section>
@endsection