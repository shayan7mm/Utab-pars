<form action="{{ route('teams.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>نام</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label>سمت</label>
        <input type="text" name="position" class="form-control">
    </div>

    <div class="mb-3">
        <label>تخصص</label>
        <input type="text" name="specialty" class="form-control">
    </div>

    <div class="mb-3">
        <label>عکس پروفایل</label><br>
        <button id="lfm" data-input="image" data-preview="holder" class="btn btn-primary">انتخاب تصویر</button>
        <input id="image" class="form-control" type="text" name="image">
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
    </div>

    <div class="mb-3">
        <label>توضیحات</label>
        <textarea id="editor" name="description" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">ثبت</button>
</form>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<!-- FileManager -->
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    // FileManager برای انتخاب تصویر پروفایل
    $('#lfm').filemanager('image');

    // CKEditor
    CKEDITOR.replace('editor', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files'
    });
</script>
