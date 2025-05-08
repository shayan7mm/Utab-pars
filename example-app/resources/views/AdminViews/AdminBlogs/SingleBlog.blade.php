<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->meta_title }}</title>
    <meta name="description" content="{{ $post->meta_description }}">
    <meta name="keywords" content="{{ $post->focus_keyword }},{{ $post->tags }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #1e1e2f;
            color: #cfcfd9;
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            direction: rtl;
            text-align: right;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #2a2a3a;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .post-title {
            color: #fff;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .post-meta {
            color: #888;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .post-content {
            font-size: 18px;
            line-height: 1.8;
        }
        .tags {
    margin-top: 10px;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
}

.tags span {
    background: #444;
    color: #fff;
    padding: 5px 15px;
    border-radius: 15px;
    font-size: 14px;
    display: inline-block;
    white-space: nowrap;
}


       
    .tags strong {
        color: #ccc;
   }

        .featured-image {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #00bcd4;
            font-size: 16px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .post-content img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin: 10px 0;
    }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="post-title">{{ $post->title }}</h1>
        <p class="post-meta">نویسنده: {{ $post->author->name }} | تاریخ: {{ jdate($post->published_at)->format('Y/m/d') }}</p>
        
        @if($post->featured_image)
            <img src="/img/{{ $post->featured_image }}" alt="{{ $post->title }}" class="featured-image">
        @endif
        
        <div class="post-content">
            
            <p>{!! $post->content !!}</p>
        </div>

        <div class="tags">
            <strong>برچسب‌ها: </strong>
            @foreach(explode(',', $post->tags) as $tag)
                <span>{{ trim($tag) }}</span>
            @endforeach
        </div>
        
        

        <a href="{{ route('admin') }}" class="back-link">
            <i class="fas fa-arrow-right"></i> بازگشت به وبلاگ
        </a>
    </div>


    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
