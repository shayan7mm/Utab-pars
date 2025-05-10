@extends('layouts.ClientLayouts.master')

@section('title', 'وبلاگ - شایان وب مستر')
@section('description', 'در این صفحه از سایت شایان وب مستر می توانید آخرین اخبار و اطلاعات را درباره برنامه نویسی و دیجیتال مارکتینگ بخوانید و اطلاعات خود را در این زمینه بروز کنید.')
@section('keywords', 'وبلاگ, برنامه نویسی, دیجیتال مارکتینگ')
@section('meta_author', 'شایان مرادی')
@section('favicon')
    <link rel="icon" href="{{ asset('img/favicon1.png')}}" type="image/png">
@endsection

@section('content')
<style>
    @import url("/fonts/stylesheet.css");

    /* body {
        background: #2e5170;
        color: #e8eaed;
        font-family: "peyda", sans-serif;
        padding: 20px;
    } */

    .back-button {
        position: fixed;
        top: 15px;
        left: 15px;
        background: linear-gradient(0deg, #0f0715 0%, #45277b 100%);
        border: none;
        color: white;
        font-size: 24px;
        padding: 6px 12px;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .card {
        background: #303134;
        border-radius: 8px;
        padding: 20px;
        transition: box-shadow 0.3s;
    }

    .card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .card h3 {
        color: #8ab4f8;
        font-size: 20px;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card h3 a {
        text-decoration: none;
        color: inherit;
    }

    .card h3 a:hover {
        text-decoration: underline;
    }

    .card .url {
        color: #999fa3;
        font-size: 14px;
        margin: 5px 0;
        word-wrap: break-word;
    }

    .card .date {
        color: #bdc1c6;
        font-size: 12px;
        margin-bottom: 8px;
    }

    .card .meta {
        color: #e8eaed;
        font-size: 14px;
        line-height: 1.5;
    }

    .favicon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .btn-primary {
        margin-top: 15px;
        display: inline-block;
        background-color: #4285f4;
        color: #fff;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s;
    }

    .btn-primary:hover {
        background-color: #3367d6;
    }

    @media screen and (max-width: 768px) {
        .card h3 {
            flex-direction: column;
            align-items: flex-start;
        }

        .favicon {
            width: 40px;
            height: 40px;
        }
    }
</style>



<div class="container">
    @foreach ($post as $item)
        @if ($item->is_published == 1)
            <div class="card">
                <h3>
                    <img class="favicon" src="{{ asset('img/' . $item->featured_image) }}" alt="{{ $item->title }}">
                    <a href="{{ url('blog/blogDetail/' . $item->slug) }}">{{ $item->title }}</a>
                </h3>
                <div class="url">shayanwebmaster.ir/blog/{{ $item->slug }}</div>
                <div class="date">
                    {{ $item->published_at ? \Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($item->published_at))->format('j F Y') : 'منتشر نشده' }}
                </div>
                <div class="meta">{{ $item->meta_description }}</div>
                <a class="btn-primary" href="{{ url('Blog/BlogDetail/' . $item->slug) }}" title="{{ $item->meta_title }}">
                    مشاهده
                </a>
            </div>
        @endif
    @endforeach
</div>
@endsection
