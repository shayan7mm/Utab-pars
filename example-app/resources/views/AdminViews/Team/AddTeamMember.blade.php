{{-- resources/views/admin/teams/index.blade.php --}}
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت اعضای تیم</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CKEditor Full -->
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>

    <!-- FileManager -->
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <style>
        body {
            padding: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        #holder img {
            margin-top: 10px;
            max-height: 100px;
        }
    </style>
</head>

<body>

<div class="container">
    <h1 class="mb-4 text-center">فرم افزودن اعضای تیم</h1>

    <div class="card mb-5 shadow-sm">
        <div class="card-body">
            <form action="{{ route('InsertTeamMember') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>نام</label>
                        <input type="text" name="name" class="form-control" placeholder="نام عضو تیم" required>
                    </div>
                    <div class="col-md-6">
                        <label>سمت</label>
                        <input type="text" name="position" class="form-control" placeholder="سمت یا عنوان شغلی" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>تخصص</label>
                        <input type="text" name="specialty" class="form-control" placeholder="تخصص" required>
                    </div>
                    <div class="col-md-6">
                        <label>عکس پروفایل</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button id="lfm" data-input="image" data-preview="holder" class="btn btn-outline-primary">
                                    انتخاب تصویر
                                </button>
                            </span>
                            <input id="image" class="form-control" type="text" name="image" placeholder="آدرس تصویر" required>
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>توضیحات</label>
                    <textarea id="editor" name="description" class="form-control" placeholder="توضیحات درباره عضو تیم"></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">ثبت عضو</button>
                </div>
            </form>
        </div>
    </div>

    <h2 class="mb-3 text-center">لیست اعضای تیم</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>نام</th>
                    <th>سمت</th>
                    <th>تخصص</th>
                    <th>عکس</th>
                    <th>توضیحات</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teams as $key => $team)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->position }}</td>
                        <td>{{ $team->specialty }}</td>
                        <td><img src="{{ $team->image }}" alt="{{ $team->name }}" height="60"></td>
                        <td>{!! Str::limit(strip_tags($team->description), 50) !!}</td>
                        <td>
                            <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('آیا مطمئنید؟')" class="btn btn-sm btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">هیچ عضوی ثبت نشده است.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        // اتصال File Manager به دکمه انتخاب تصویر
        $('#lfm').filemanager('image');

        // فعال سازی کامل CKEditor
        CKEDITOR.replace('editor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files'
        });
    });
</script>

</body>
</html>
