<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function AdminBlog()
    {
        $posts = BlogPost::latest()->paginate(10); // دریافت آخرین پست‌ها با صفحه‌بندی
        return view('AdminViews.AdminBlogs.AllBlogs', compact('posts'));
    }

    public function AddNewBlog()
    {
       
        return view('AdminViews.AdminBlogs.AddNewBlog' );
    }

    
    public function InsertBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'focus_keyword' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
        ]);
    
        // ذخیره تصویر شاخص اگر موجود بود
        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = time() . '-' . $request->file('featured_image')->getClientOriginalName();
            $request->file('featured_image')->move(public_path('img/'), $imagePath);
        }
    
        // ** تشخیص زبان اسلاگ و تبدیل آن **
        $slug = trim($request->slug);
        if (preg_match('/[a-zA-Z]/', $slug)) {
            // اگر شامل حروف انگلیسی باشد، از Str::slug استفاده کن
            $slug = Str::slug($slug);
        } else {
            // در غیر این صورت، اسلاگ فارسی ایجاد شود
            $slug = preg_replace('/\s+/', '-', $slug);
            $slug = preg_replace('/[^اآبپتثجچحخدذرزسشصضطظعغفقکگلمنوهی0-9-]/u', '', $slug);
        }
    
        // ** پردازش تگ‌ها به‌صورت صحیح **
        $tagsArray = preg_split('/[،,]/u', $request->tags); // جدا کردن با ',' و '،'
        $tagsArray = array_map('trim', $tagsArray); // حذف فاصله‌های اضافی
        $tagsArray = array_filter($tagsArray); // حذف تگ‌های خالی
        $tagsArray = array_unique($tagsArray); // حذف تگ‌های تکراری
        $tagsString = implode(',', $tagsArray); // تبدیل دوباره به رشته ذخیره‌سازی
    
        BlogPost::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'author_id' => auth()->id(),
            'featured_image' => $imagePath,
            'is_published' => $request->has('is_published'),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'focus_keyword' => $request->focus_keyword,
            'tags' => $tagsString, // ** ذخیره به شکل صحیح **
            'published_at' => $request->has('is_published') ? now() : null,
        ]);
    
        return redirect()->route('AddNewBlog')->with('success', 'پست جدید ایجاد شد.');
    }
    
    
    
    

    // نمایش فرم ویرایش پست
    public function EditBlog($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('AdminViews.AdminBlogs.EditBlog', compact('post'));
    }

    // بروزرسانی پست در دیتابیس
  public function UpdateBlog(Request $request)
{
    $request->validate([
        // 'id' => 'required|exists:blogs,id',
        'title' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'content' => 'required',
        'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
        'focus_keyword' => 'nullable|string|max:255',
        'tags' => 'nullable|string',
        'is_published' => 'nullable|boolean',
    ]);

    $post = BlogPost::findOrFail($request->id);

    $post->title = $request->title;
    $post->slug = $request->slug;
    $post->content = $request->content;
    $post->meta_title = $request->meta_title;
    $post->meta_description = $request->meta_description;
    $post->focus_keyword = $request->focus_keyword;
    $post->tags = $request->tags;
    $post->is_published = $request->has('is_published') ? 1 : 0;

    // آپلود تصویر شاخص (مثل insert)
   if ($request->hasFile('featured_image')) {
    $imagePath = time() . '-' . $request->file('featured_image')->getClientOriginalName();
    $request->file('featured_image')->move('img', $imagePath);
    $post->featured_image = $imagePath; // فقط اسم فایل، بدون img/
}

    $post->save();

    return redirect()->route('AdminBlog')->with('success', 'پست با موفقیت ویرایش شد.');
}

    // حذف پست از دیتابیس
    public function DeleteBlog($id)
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();

        return redirect()->route('AdminBlog')->with('success', 'پست حذف شد.');
    }

    public function blogs()
    {
        $post = BlogPost::all();
        return view("AdminViews.blogs" , compact('post'));
        
    }

    public function show($slug)
{
    $post = BlogPost::where('slug', $slug)->firstOrFail();
    return view('AdminViews.AdminBlogs.SingleBlog', compact('post'));
}


public function filterByTag($tag)
{
    $posts = BlogPost::where('tags', 'like', "%$tag%")->get();
    return view('UserViews.BlogList', compact('posts', 'tag'));
}












/*--------------------------this is only for text editor-------------------*/
public function upload(Request $request)
{
    if ($request->hasFile('upload')) {
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        $request->file('upload')->move(('img'), $fileName);

        $url = asset('img/' . $fileName);
        return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
    }

    return response()->json(['uploaded' => 0, 'error' => ['message' => 'No file uploaded']]);
}

}

