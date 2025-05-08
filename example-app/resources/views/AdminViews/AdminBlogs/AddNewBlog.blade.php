<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ایجاد پست جدید</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <style>
        .ck-editor__editable_inline {
            height: 400px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-300 min-h-screen p-6">

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-xl space-y-6">
        <h1 class="text-3xl font-bold text-blue-700 text-center">📝 ایجاد پست جدید</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-lg border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('InsertBlog') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-1">عنوان پست</label>
                <input type="text" name="title" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">اسلاگ (لینک سئو)</label>
                <input type="text" name="slug" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">محتوای پست</label>
                <textarea name="content" id="editor"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">تصویر شاخص</label>
                <input type="file" name="featured_image" class="w-full border border-gray-300 rounded-lg p-2 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <div class="flex items-center space-x-2 space-x-reverse">
                <input type="checkbox" name="is_published" id="publish" class="w-5 h-5 text-blue-600 border-gray-300 rounded">
                <label for="publish" class="text-gray-700 font-medium">منتشر شود؟</label>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">عنوان متا</label>
                <input type="text" name="meta_title" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">توضیحات متا</label>
                <textarea name="meta_description" rows="3" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">کلمه کلیدی</label>
                <input type="text" name="focus_keyword" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">تگ‌ها (با کاما یا «،» جدا کنید)</label>
                <input type="text" name="tags" value="{{ old('tags', isset($post) ? $post->tags : '') }}"
                    oninput="this.value = this.value.replace(/،،+/g, '،').replace(/،\s+/g, '،').replace(/(^،+|،+$)/g, '');"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex justify-between items-center pt-4">
                <button type="reset" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">ریست</button>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-800 transition">ایجاد پست</button>
            </div>
        </form>
    </div>

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
