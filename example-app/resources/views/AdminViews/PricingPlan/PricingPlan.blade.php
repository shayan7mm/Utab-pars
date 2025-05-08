{{-- resources/views/admin/pricing/index.blade.php --}}
@extends('layouts.AdminLayouts.Header2') {{-- فرض بر اینه که layout داری --}}

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">مدیریت پلن‌های قیمت‌گذاری</h2>

    {{-- افزودن پلن جدید --}}
    <form action="{{ route('InsertBusinessPlan') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>عنوان پلن</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>قیمت</label>
            <input type="text" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>ویژگی‌ها (هر ویژگی یک خط)</label>
            <textarea name="features" rows="5" class="form-control" placeholder="ویژگی اول&#10;ویژگی دوم&#10;ویژگی سوم"></textarea>

        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured">
            <label class="form-check-label" for="is_featured">پلن ویژه</label>
        </div>

        <button type="submit" class="btn btn-success">افزودن پلن</button>
    </form>

    <hr class="my-4">

    {{-- لیست پلن‌ها --}}
    <h4>لیست پلن‌ها</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>عنوان</th>
                <th>قیمت</th>
                <th>ویژگی‌ها</th>
                <th>ویژه؟</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plans as $plan)
            <tr>
                <td>{{ $plan->title }}</td>
                <td>{{ $plan->price }}</td>
                <td>
                    <ul>
                        @foreach(json_decode($plan->features) as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $plan->is_featured ? 'بله' : 'خیر' }}</td>
                <td>
                    {{-- حذف --}}
                    <form action="{{ route('DeletePricingPlan', $plan->id) }}" method="POST" onsubmit="return confirm('حذف شود؟')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
                <td>
                   <a href="{{ route('EditPricingPlan' , ['id' => $plan->id]) }}" class=" btn-primary btn-sm">ویرایش</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
