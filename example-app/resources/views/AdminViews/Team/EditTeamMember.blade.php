<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ویرایش عضو تیم</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
</head>
<body class="p-4">

<div class="container">
    <h2 class="mb-4 text-center">ویرایش عضو تیم: {{ $team->name }}</h2>

    <form action="{{ route('UpdateTeamMember', ['id' => $team->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label>نام</label>
                <input type="text" name="name" class="form-control" value="{{ $team->name }}" required>
            </div>
            <div class="col-md-6">
                <label>سمت</label>
                <input type="text" name="position" class="form-control" value="{{ $team->position }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>تخصص</label>
                <input type="text" name="specialty" class="form-control" value="{{ $team->specialty }}">
            </div>
            <div class="col-md-6">
                <label>تصویر فعلی</label>
                <div>
                    <img src="{{ asset('storage/photos/1/' . $team->image) }}" height="80">
                </div>
                <label class="mt-2">تصویر جدید</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button id="lfm" data-input="image" data-preview="holder" class="btn btn-outline-primary">
                            انتخاب تصویر
                        </button>
                    </span>
                    <input id="image" class="form-control" type="text" name="image" value="{{ $team->image }}">
                </div>
                <div id="holder" class="mt-2" style="max-height:100px;"></div>
            </div>
        </div>

        <div class="mb-3">
            <label>توضیحات</label>
            <textarea id="editor" name="description" class="form-control">{{ $team->description }}</textarea>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </div>
    </form>
</div>

<script>
    $('#lfm').filemanager('image');
    CKEDITOR.replace('editor', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        removeDialogTabs: 'image:advanced;link:advanced',
        allowedContent: 'p br strong em u; img[!src,alt,width,height,style];',
        disallowedContent: 'table thead tbody tfoot tr th td',
        on: {
            instanceReady: function (ev) {
                ev.editor.dataProcessor.htmlFilter.addRules({
                    elements: {
                        img: function (el) {
                            var src = el.attributes.src;
                            if (src && src.indexOf('data:image') === 0) {
                                alert("افزودن مستقیم تصاویر از کلیپ‌بورد پشتیبانی نمی‌شود.");
                                return false;
                            }
                        }
                    }
                });
            }
        }
    });
    CKEDITOR.on('instanceReady', function (ev) {
        ev.editor.dataProcessor.writer.selfClosingEnd = '>';
    });
</script>

</body>
</html>
