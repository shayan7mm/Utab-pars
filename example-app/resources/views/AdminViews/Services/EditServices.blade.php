@extends('layouts.AdminLayouts.Header2')
@section('content')
<main>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="text-center">ویرایش خدمت</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('UpdateService', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST') {{-- اگر route با POST ثبت شده، همین بماند. اگر PUT استفاده کردید، این را به @method('PUT') تغییر دهید. --}}
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>نام خدمت</label>
                            <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label>Alt</label>
                            <input type="text" name="alt" class="form-control" value="{{ $service->alt }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>تصویر فعلی:</label><br>
                        @if($service->featured_image)
                            <img src="{{ asset('img/services/' . $service->featured_image) }}" width="120" height="120">
                        @else
                            <p>بدون تصویر</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label>تعویض تصویر</label>
                        <input type="file" name="featured_image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>توضیحات</label>
                        <textarea name="description" class="form-control" rows="5">{{ $service->description }}</textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">ثبت تغییرات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
