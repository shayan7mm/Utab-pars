@extends('layouts.ClientLayouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center" style="color: #37517e;">پروژه‌های ما</h2>

    <div class="row">
        @foreach($resumes as $resume)
            <div class="col-md-4 mb-4">
                <a href="{{ route('resumes.show', $resume->id) }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 h-100" style="border-radius: 15px; transition: transform 0.3s;">
                        @if($resume->featured_image)
                            <img src="{{ asset('uploads/resumes/' . $resume->featured_image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $resume->alt }}" 
                                 style="height: 200px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center"
                                 style="height: 200px; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                <span class="text-muted">بدون تصویر</span>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title" style="color: #37517e;">{{ $resume->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($resume->description, 100) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
