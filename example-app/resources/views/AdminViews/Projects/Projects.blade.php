@extends('layouts.AdminLayouts.Header2')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">مدیریت پروژه‌ها</h2>

    {{-- پیام موفقیت --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- فرم افزودن پروژه --}}
    <div class="card mb-4">
        <div class="card-header">افزودن پروژه جدید</div>
        <div class="card-body">
            <form action="{{ route('resumes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="title">عنوان پروژه</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description">توضیحات</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="featured_image">تصویر اصلی</label>
                    <input type="file" name="featured_image" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="alt">متن جایگزین تصویر</label>
                    <input type="text" name="alt" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="gallery_images">تصاویر گالری</label>
                    <input type="file" name="gallery_images[]" class="form-control" multiple>
                    <small class="form-text text-muted">شما می‌توانید چندین تصویر را برای گالری انتخاب کنید.</small>
                </div>

                <button type="submit" class="btn btn-success">ثبت پروژه</button>
            </form>
        </div>
    </div>

    {{-- لیست پروژه‌ها --}}
    <div class="card">
        <div class="card-header">پروژه‌های ثبت‌شده</div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>تصویر</th>
                        <th>عنوان</th>
                        <th>توضیحات</th>
                        <th>تاریخ</th>
                        <th>عملیات</th>
                        <th>گالری تصاویر</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($resumes as $resume)
                        <tr>
                            <td>
                                @if($resume->featured_image)
                                    <img src="{{ asset('uploads/resumes/' . $resume->featured_image) }}" alt="{{ $resume->alt }}" width="100">
                                @else
                                    <span class="text-muted">ندارد</span>
                                @endif
                            </td>
                            <td>{{ $resume->title }}</td>
                            <td>{{ Str::limit($resume->description, 80) }}</td>
                            <td>{{ jdate($resume->created_at)->format('Y/m/d') }}</td>
                            <td>
                                <a href="{{ route('resumes.edit', $resume->id) }}" class="btn btn-warning btn-sm">ویرایش</a>

                                <form action="{{ route('resumes.destroy', $resume->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('آیا مطمئن هستید؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">حذف</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('resumes.gallery', $resume->id) }}" class="btn btn-info btn-sm">مشاهده گالری</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">پروژه‌ای ثبت نشده است.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
