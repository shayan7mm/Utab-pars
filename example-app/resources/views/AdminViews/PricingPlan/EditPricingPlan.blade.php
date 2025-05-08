{{-- resources/views/admin/pricing/index.blade.php --}}
@extends('layouts.AdminLayouts.Header2') {{-- فرض بر اینه که layout داری --}}

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header text-center">
                    <h3>ویرایش پلن معاملاتی</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('UpdatePricingPlan') }}" method="POST">
                        @csrf
                        @method('POST')
                      <input type="hidden"  name="id" value="{{ $plans->id }}">
                        <div class="form-group">
                            <label for="title">عنوان پلن</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $plans->title) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">قیمت (تومان)</label>
                            <input type="text" name="price" class="form-control" value="{{ old('price', $plans->price) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="features">ویژگی‌ها</label>
                            <textarea name="features" rows="5" class="form-control" required>{{ old('features', implode("\n", json_decode($plans->features))) }}</textarea>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" name="is_featured" class="form-check-input" {{ $plans->is_featured ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">ویژه</label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">ویرایش پلن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
