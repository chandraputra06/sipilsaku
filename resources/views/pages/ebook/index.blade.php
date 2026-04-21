@extends('layouts.app')

@section('content')
    @include('components.ebook.hero')
    @include('components.ebook.filter-bar')
    @include('components.ebook.book-grid')
    @include('components.ebook.popular-section')
    @include('components.ebook.payment-flow')
@endsection