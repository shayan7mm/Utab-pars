<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش پست وبلاگ</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            direction: rtl;
            padding: 20px;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            font-weight: bold;
            margin-top: 15px;
            display: block;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        .image-preview {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            margin-top: 10px;
            border-radius: 6px;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        .save-btn { background-color: #28a745; color: white; }
        .cancel-btn { background-color: #dc3545; color: white; }

        .ck-editor__editable_inline {
            min-height: 400px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>ویرایش پست وبلاگ</h2>

        @if(session('success'))
            <div style="color: green; font-weight: bold; margin-bottom: 15px;">{{ session('success') }}</div>
        @endif

        <form action="{{ route('UpdateBlog') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $post->id }}">

            <label for="title">عنوان:</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" required>

            <label for="slug">اسلاگ (Slug):</label>
            <input type="text" name="slug" value="{{ old('slug', $post->slug) }}">

            <label for="content">محتوا:</label>
            <textarea id="editor" name="content">{{ old('content', $post->content) }}</textarea>

            <label for="meta_title">متا عنوان:</label>
            <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}">

            <label for="meta_description">متا توضیحات:</label>
            <textarea name="meta_description" rows="3">{{ old('meta_description', $post->meta_description) }}</textarea>

            <label for="focus_keyword">کلمات کلیدی (Keyword اصلی):</label>
            <input type="text" name="focus_keyword" value="{{ old('focus_keyword', $post->focus_keyword) }}">

            <label for="tags">تگ‌ها (با , یا ، جدا کنید):</label>
            <input type="text" name="tags" value="{{ old('tags', $post->tags) }}">

            <label for="featured_image">تصویر شاخص:</label>
            <input type="file" name="featured_image" onchange="previewImage(event)">
            <img id="image-preview" class="image-preview" 
                 src="{{ asset($post->featured_image) }}" 
                 onerror="this.src='{{ asset('img/default.png') }}'" 
                 alt="پیش‌نمایش تصویر">

            <label style="margin-top: 20px;">
                <input type="checkbox" name="is_published" value="1" style="width: auto; height: auto;" 
                    {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                انتشار پست
            </label>

            <div class="btn-group">
                <button type="submit" class="save-btn">ذخیره تغییرات</button>
                <button type="button" class="cancel-btn" onclick="window.history.back()">لغو</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('image-preview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
