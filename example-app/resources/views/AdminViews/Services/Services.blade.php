@extends('layouts.AdminLayouts.Header2')
@section('content')
  <main>  
 <!--  BEGIN MAIN CONTAINER  -->
 <div class="main-container" id="container">


    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container">
                <div class="row layout-top-spacing">
                    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <a class="btn-btn-primary" href="#"><h4>اضافه کردن خدمات</h4></a>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-4">
                                        <thead>
                                            <tr>
                                                <th>نام</th>
                                                <th>توضیحات</th>
                                                <th>Alt</th>
                                                <th class="text-center">تصویر</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->alt }}</td>
                                                <td class="text-center">
                                                    @if($item->featured_image)
                                                    <img src="{{ asset('img/services/' . $item->featured_image) }}" alt="{{ $item->alt }}" width="100" height="100">
                                                @else
                                                    <span>بدون تصویر</span>
                                                @endif
                                                </td>
                                                <td class="text-center">
                                                   <a href="{{ route('DeleteService' , ['id' => $item->id]) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </a>
                                                </td>
                                                <td><a class="btn btn-primary" href="{{ route('EditService' , ['id' =>$item->id]) }}">ویرایش</a></td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>

                                
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            </div>
            <div class="card mb-5 shadow-sm">
                <div class="card-body">
                    <form action="{{ route('InsertService') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>نام خدمات</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Alt</label>
                                <input type="text" name="alt" class="form-control" required>
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <label>عکس پروفایل</label>
                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">تصویر</label>
                                <input type="file" class="form-control" id="image" name="featured_image">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div>
                    
                        <div class="mb-3">
                            <label>توضیحات</label>
                            <textarea name="description" class="form-control" placeholder="توضیحات درباره خدمات"></textarea>
                        </div>
                    
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </div>
                    </form>
                    
                </div>
            </div>
    <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->
</main>
<script>
    $(document).ready(function () {
        // Connect Laravel File Manager to image button
        $('#lfm').filemanager('image');

        // Initialize CKEditor
        CKEDITOR.replace('editor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',

            // Remove unnecessary dialog tabs
            removeDialogTabs: 'image:advanced;link:advanced',

            // ✅ Allow only the following tags: <p>, <br>, <strong>, <em>, <u>, <img>
            allowedContent: 'p br strong em u; img[!src,alt,width,height,style];',

            // ❌ Disallow tables and related tags like <td>, <th>
            disallowedContent: 'table thead tbody tfoot tr th td',

            // ✅ Prevent base64 image pasting from clipboard
            on: {
                instanceReady: function (ev) {
                    ev.editor.dataProcessor.htmlFilter.addRules({
                        elements: {
                            img: function (el) {
                                var src = el.attributes.src;
                                if (src && src.indexOf('data:image') === 0) {
                                    alert("افزودن مستقیم تصاویر از کلیپ‌بورد پشتیبانی نمی‌شود. لطفاً از دکمه انتخاب تصویر استفاده کنید.");
                                    return false;
                                }
                            }
                        }
                    });
                }
            }
        });

        // ✅ Force <img> tags to self-close properly
        CKEDITOR.on('instanceReady', function (ev) {
            ev.editor.dataProcessor.writer.selfClosingEnd = '>';
        });
    });
</script>
@endsection