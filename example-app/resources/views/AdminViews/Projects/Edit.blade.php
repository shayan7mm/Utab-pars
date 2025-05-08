@extends('layouts.AdminLayouts.Header2')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">ویرایش پروژه</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- فرم اصلی پروژه --}}
    <form action="{{ route('resumes.update', $resume->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title">عنوان پروژه</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $resume->title) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">توضیحات</label>
            <textarea name="description" class="form-control" rows="5">{{ old('description', $resume->description) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="featured_image">تصویر شاخص</label><br>
            @if($resume->featured_image)
                <img src="{{ asset('uploads/resumes/' . $resume->featured_image) }}" alt="{{ $resume->alt }}" class="img-thumbnail mb-2" width="150">
            @endif
            <input type="file" name="featured_image" class="form-control-file">
        </div>

        <div class="form-group mb-3">
            <label for="alt">توضیح تصویر (alt)</label>
            <input type="text" name="alt" class="form-control" value="{{ old('alt', $resume->alt) }}">
        </div>

        {{-- گالری تصاویر (نمایش فعلی و حذف هر عکس) --}}
        <div class="form-group mb-3">
            <label>تصاویر گالری</label>
            <div class="mb-3">
                @foreach($resume->images as $image)
                    <div class="d-inline-block position-relative me-2">
                        <img src="{{ asset('uploads/resumes/gallery/' . $image->image) }}" class="img-thumbnail" width="100">
                        <form action="{{ route('resumes.deleteGalleryImage', $image->id) }}" method="POST" style="position:absolute;top:0;left:0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="top:5px;right:5px;" onclick="return confirm('آیا مطمئن هستید؟')">×</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- اضافه کردن عکس‌های جدید به گالری --}}
        <div class="form-group mb-3">
            <label for="gallery_images">افزودن تصاویر جدید به گالری</label>
            <input type="file" name="gallery_images[]" class="form-control-file" multiple>
        </div>

        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        <a href="{{ route('Projects') }}" class="btn btn-secondary">بازگشت</a>
    </form>
</div>
@endsection
