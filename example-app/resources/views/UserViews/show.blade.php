@extends('layouts.ClientLayouts.master')

@section('content')
<div class="container mt-5" style="max-width: 960px;">

    {{-- عنوان پروژه --}}
    <h2 class="text-center mb-4 fw-bold" style="color: #37517e;">{{ $resume->title }}</h2>

    {{-- تصویر شاخص --}}
    @if($resume->featured_image)
        <div class="text-center mb-4" style="overflow: hidden; padding: 20px;">
            <img src="{{ asset('uploads/resumes/' . $resume->featured_image) }}" 
                 alt="{{ $resume->alt }}" 
                 class="img-fluid rounded shadow-sm" 
                 style="max-height: 320px; object-fit: contain; width: 100%; border-radius: 15px;">
        </div>
    @endif

    {{-- توضیحات پروژه --}}
    <p class="text-muted mb-5" style="line-height: 2; text-align: justify;">
        {{ $resume->description }}
    </p>

    {{-- گالری حرفه‌ای --}}
    @if($resume->images->count())
        <h4 class="text-center mb-4" style="color: #37517e;">گالری تصاویر پروژه</h4>

        <div class="row g-3 mb-5">
            @foreach($resume->images as $image)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ asset('uploads/resumes/gallery/' . $image->image) }}" 
                       class="glightbox" 
                       data-gallery="project-gallery" 
                       data-title="{{ $resume->title }}">
                        <img src="{{ asset('uploads/resumes/gallery/' . $image->image) }}" 
                             class="img-fluid rounded shadow-sm" 
                             alt="{{ $image->alt }}" 
                             style="object-fit: cover; aspect-ratio: 1 / 1;">
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">تصویری برای این پروژه ثبت نشده است.</div>
    @endif
</div>
@endsection
