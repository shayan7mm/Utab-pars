@extends('layouts.ClientLayouts.master')

@section('title', $post->meta_title)
@section('description', $post->meta_description)
@section('keywords', $post->focus_keyword . ',' . $post->tags)

@section('content')

<!-- شروع بخش نوار مسیر -->
<section class="breadcrumb_area" data-bg-image="{{ asset('assets/img/breadcrumb/breadcrumb-bg.jpg') }}" data-bg-color="#140C1C">
    <div class="container">
        <div class="breadcrumb_content text-center">
            <h2 class="title">{{ $post->title }}</h2>
            <div class="breadcrumb_navigation">
                <span><a href="{{ route('user') }}">خانه</a></span>
                <i class="far fa-long-arrow-left"></i>
                <span>جزئیات وبلاگ</span>
            </div>
        </div>
    </div>
</section>
<!-- پایان بخش نوار مسیر -->

<!-- شروع محتوای بلاگ -->
<section class="tj-post-details__area pt-70 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article class="tj-single__post">
                    <div class="tj-post__thumb mb-4">
                        <img src="{{ asset('img/'.$post->featured_image) }}" alt="{{ $post->title }}" class="img-fluid rounded shadow">
                        <a href="#" class="category">آموزشی</a>
                    </div>

                    <div class="tj-post__content">
                        <div class="tj-post__meta">
                            <span><i class="fa-light fa-user"></i> شایان</span>
                            <span><i class="fa-light fa-calendar-days"></i> {{ $post->published_at ? \Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($post->published_at))->format('j F Y') : 'منتشر نشده' }}</span>
                            
                        </div>

                        <h3 class="tj-post__title">{{ $post->title }}</h3>

                        <div class="post-body mt-4">
                            {!! $post->content !!}
                        </div>

                        @if (!empty($post->tags))
                        <div class="post-tags mt-4">
                            <h5>برچسب‌ها:</h5>
                            <div class="tagcloud">
                                @foreach(explode(',', $post->tags) as $tag)
                                    <a href="{{ route('blog.tag', ['tag' => trim($tag)]) }}">{{ trim($tag) }}</a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </article>

                <!-- پست قبلی و بعدی -->
                <div class="single-post__navigation mt-5 d-flex justify-content-between">
                    @if ($previous)
                    <div class="tj-navigation_post previous">
                        <a href="{{ url('Blog/BlogDetail/'.$previous->slug) }}" class="d-flex align-items-center gap-3">
                            <img src="{{ asset('img/'.$previous->featured_image) }}" alt="{{ $previous->title }}" width="80" class="rounded shadow">
                            <div>
                                <span class="text-muted">قبلی</span>
                                <h6>{{ $previous->title }}</h6>
                            </div>
                        </a>
                    </div>
                    @endif

                    @if ($next)
                    <div class="tj-navigation_post next text-end">
                        <a href="{{ url('Blog/BlogDetail/'.$next->slug) }}" class="d-flex align-items-center gap-3 justify-content-end">
                            <div>
                                <span class="text-muted">بعدی</span>
                                <h6>{{ $next->title }}</h6>
                            </div>
                            <img src="{{ asset('img/'.$next->featured_image) }}" alt="{{ $next->title }}" width="80" class="rounded shadow">
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
