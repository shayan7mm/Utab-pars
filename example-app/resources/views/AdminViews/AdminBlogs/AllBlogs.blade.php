<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت مقالات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            direction: rtl;
            background-color: #f8f9fa;
        }
        .blog-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease-in-out;
        }
        .blog-card:hover {
            transform: translateY(-3px);
        }
        .btn-edit {
            background-color: #ffc107;
            color: black;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center mb-4">مدیریت مقالات</h2>
    
    <a href="{{ route('AddNewBlog') }}" class="btn btn-primary mb-3">+ ایجاد مقاله جدید</a>
    
    <div class="row">
        <!-- لیست مقالات -->
        @foreach($posts as $blog)
        <div class="col-md-6">
            <div class="blog-card">
                <h4>{{ $blog->title }}</h4>
                <p><strong>نویسنده:</strong> {{ $blog->author->name }}</p>
                <p><strong>تاریخ انتشار:</strong> 
                    {{ $blog->published_at ? \Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($blog->published_at))->format('Y/m/d') : 'منتشر نشده' }}
                </p>
                
                <a class="btn btn-primary" href="{{ url('blog/'.$blog->slug) }}" title="{{ $blog->meta_title }}">
                    مشاهده
                </a>
                
                
                <a href="{{ route('editBlog' , ['id'=>$blog->id]) }}" class="btn btn-sm btn-edit">ویرایش</a>
                <a href="{{ route('deleteBlog',['id'=>$blog->id]) }}" class="btn btn-sm btn-delete" >حذف</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal تأیید حذف -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">حذف مقاله</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                آیا مطمئن هستید که می‌خواهید این مقاله را حذف کنید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var blogId = button.getAttribute('data-id');
        var deleteForm = document.getElementById('deleteForm');
        deleteForm.action = "/admin/blog/" + blogId;
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
