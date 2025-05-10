@extends('layouts.ClientLayouts.master')

@section('title', 'وبلاگ‌ها - ' . $tag)
@section('description', 'در این صفحه از سایت شایان وب مستر شما می‌توانید آخرین اخبار و اطلاعات را بر اساس برچسب‌های مورد علاقتان بخوانید.')
@section('keywords', 'وبلاگ, تگ‌ها, برچسب‌ها')

@section('content')

<!-- شروع بخش نوار مسیر -->
<section class="breadcrumb_area" data-bg-image="{{ asset('assets/img/breadcrumb/breadcrumb-bg.jpg') }}" data-bg-color="#140C1C">
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h2 class="title">پست‌های مرتبط با تگ: {{ $tag }}</h2>
            <div class="breadcrumb_navigation">
                <span><a href="{{ route('user') }}">خانه</a></span>
                <i class="far fa-long-arrow-left"></i>
                <span>برچسب‌ها</span>
            </div>
        </div>
    </div>
</section>
<!-- پایان بخش نوار مسیر -->

<!-- شروع محتوای پست‌های مرتبط با تگ -->
<section class="tj-post-details__area pt-70 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @foreach ($posts as $item)
                    @if ($item->is_published == 1)
                        <div class="card mb-4 p-4 rounded shadow-sm" style="background-color: #f7f7f7;">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img class="rounded" src="{{ asset('img/'.$item->featured_image) }}" alt="{{ $item->title }}" width="80" height="80">
                                <div>
                                    <h5 class="mb-1">
                                        <a href="{{ url('Blog/BlogDetail/'.$item->slug) }}" class="text-dark">{{ $item->title }}</a>
                                    </h5>
                                    <small class="text-muted d-block">
                                        {{ $item->published_at ? \Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($item->published_at))->format('j F Y') : 'منتشر نشده' }}
                                    </small>
                                    <small class="text-muted d-block">shayanwebmaster.ir/blog/{{ $item->slug }}</small>
                                </div>
                            </div>
                            <p class="text-secondary mb-0">{{ $item->meta_description }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
