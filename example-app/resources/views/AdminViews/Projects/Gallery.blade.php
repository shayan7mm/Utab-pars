@extends('layouts.AdminLayouts.Header2')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">گالری تصاویر پروژه: {{ $resume->title }}</h2>

    {{-- پیام موفقیت --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- تصاویر گالری --}}
    <div class="row">
        @foreach ($galleryImages as $image)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('uploads/resume_images/' . $image->image) }}" class="card-img-top" alt="{{ $image->alt }}">
                    <div class="card-body">
                        <p class="card-text">{{ $image->alt }}</p>
                        <form action="{{ route('resumes.deleteGalleryImage', $image->id) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید که این تصویر را حذف می‌کنید؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">حذف تصویر</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('Projects') }}" class="btn btn-secondary mt-4">بازگشت به لیست پروژه‌ها</a>
</div>
@endsection