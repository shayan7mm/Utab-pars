<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ایجاد پست جدید</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

  <style type="text/css">
    .ck-editor__editable_inline
    {
           height: 650px;
    }
    
        .alert-dismissible .close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 0.75rem 1.25rem;
            color: indianred;
        }
    
  </style>

  
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">ایجاد پست جدید</h2>

        <form action="{{ route('InsertBlog') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <!-- عنوان -->
            <div>
                <label class="block text-gray-600 font-semibold">عنوان پست:</label>
                <input type="text" name="title" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- اسلاگ -->
            <div>
                <label class="block text-gray-600 font-semibold">اسلاگ (لینک سئو):</label>
                <input type="text" name="slug" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <!-- محتوا -->
            <div>
                <label class="block text-gray-600 font-semibold">محتوای پست:</label>
                <textarea  name="content" type="text" id="editor" rows="6" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300"></textarea>
            </div>

            <!-- تصویر شاخص -->
            <div>
                <label class="block text-gray-600 font-semibold">تصویر شاخص:</label>
                <input type="file" name="featured_image" class="w-full p-2 border rounded-lg">
            </div>

            <!-- وضعیت انتشار -->
            <div class="flex items-center">
                <input type="checkbox" name="is_published" class="mr-2">
                <label class="text-gray-600 font-semibold">منتشر شود؟</label>
            </div>

            <!-- فیلدهای سئو -->
            <div>
                <label class="block text-gray-600 font-semibold">عنوان متا:</label>
                <input type="text" name="meta_title" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-600 font-semibold">توضیحات متا:</label>
                <textarea name="meta_description" rows="3" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300"></textarea>
            </div>

            <div>
                <label class="block text-gray-600 font-semibold">کلمه کلیدی:</label>
                <input type="text" name="focus_keyword" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-600 font-semibold">تگ‌ها (با کاما جدا کنید):</label>
                <input type="text" name="tags" value="{{ old('tags', isset($post) ? $post->tags : '') }}" 
                       class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300"
                       oninput="this.value = this.value.replace(/،،+/g, '،').replace(/،\s+/g, '،').replace(/(^،+|،+$)/g, '');">
            </div>

            <!-- دکمه‌ها -->
            <div class="flex justify-end space-x-2">
                <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-700">ریست</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-800">ایجاد پست</button>
            </div>
        </form>
    </div>


    
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), 
         {
  
            ckfinder:
            {
              uploadUrl: "{{ route('ckeditor.upload' , ['_token' => csrf_token()]) }}",
            }
         }
      )
        .catch( error => {
            console.error( error );
        } );
  </script>
</body>
</html>
