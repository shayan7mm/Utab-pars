<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\ResumeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ResumeController extends Controller
{
    /**
     * ذخیره پروژه جدید همراه با گالری
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'alt' => 'nullable|string',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $filename = null;
        if ($request->hasFile('featured_image')) {
            $filename = time() . '.' . $request->featured_image->getClientOriginalExtension();
            $request->featured_image->move(public_path('uploads/resumes'), $filename);
        }

        $resume = Resume::create([
            'title' => $request->title,
            'description' => $request->description,
            'featured_image' => $filename,
            'alt' => $request->alt,
        ]);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $galleryName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/resumes/gallery'), $galleryName);

                ResumeImage::create([
                    'resume_id' => $resume->id,
                    'image' => $galleryName,
                    'alt' => '',
                ]);
            }
        }

        return redirect()->route('Projects')->with('success', 'پروژه با موفقیت ثبت شد.');
    }

    /**
     * فرم ویرایش پروژه
     */
    public function edit($id)
    {
        $resume = Resume::with('images')->findOrFail($id);
        return view('AdminViews.Projects.Edit', compact('resume'));
    }

    /**
     * بروزرسانی پروژه
     */
    public function update(Request $request, $id)
    {
        $resume = Resume::findOrFail($id);
    
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'alt' => 'nullable|string',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);
    
        // آپلود تصویر شاخص (در صورت وجود)
        if ($request->hasFile('featured_image')) {
            if ($resume->featured_image && File::exists(public_path('uploads/resumes/' . $resume->featured_image))) {
                File::delete(public_path('uploads/resumes/' . $resume->featured_image));
            }
    
            $filename = uniqid() . '.' . $request->featured_image->getClientOriginalExtension();
            $request->featured_image->move(public_path('uploads/resumes'), $filename);
            $resume->featured_image = $filename;
        }
    
        // بروزرسانی اطلاعات
        $resume->title = $request->title;
        $resume->description = $request->description;
        $resume->alt = $request->alt;
        $resume->save();
    
        // آپلود تصاویر جدید گالری (در صورت وجود)
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/resumes/gallery'), $imageName);
    
                ResumeImage::create([
                    'resume_id' => $resume->id,
                    'image' => $imageName,
                    'alt' => '',
                ]);
            }
        }
    
        return redirect()->route('Projects')->with('success', 'پروژه با موفقیت ویرایش شد.');
    }

    /**
     * حذف پروژه و تصاویر گالری
     */
    public function destroy($id)
    {
        $resume = Resume::with('images')->findOrFail($id);

        if ($resume->featured_image && File::exists(public_path('uploads/resumes/' . $resume->featured_image))) {
            File::delete(public_path('uploads/resumes/' . $resume->featured_image));
        }

        foreach ($resume->images as $img) {
            if ($img->image && File::exists(public_path('uploads/resumes/gallery/' . $img->image))) {
                File::delete(public_path('uploads/resumes/gallery/' . $img->image));
            }
            $img->delete();
        }

        $resume->delete();

        return redirect()->route('Projects')->with('success', 'پروژه با موفقیت حذف شد.');
    }

    /**
     * حذف یک عکس از گالری پروژه خاص
     */
    public function deleteGalleryImage($image_id)
    {
        $image = ResumeImage::findOrFail($image_id);
        if ($image->image && File::exists(public_path('uploads/resumes/gallery/' . $image->image))) {
            File::delete(public_path('uploads/resumes/gallery/' . $image->image));
        }
        $image->delete();
        return back()->with('success', 'تصویر با موفقیت حذف شد.');
    }

    public function addGalleryImage(Request $request, $id)
{
    $request->validate([
        'image' => 'required|image|mimes:jpg,jpeg,png,webp',
    ]);

    $resume = Resume::findOrFail($id);

    $filename = time() . '.' . $request->image->getClientOriginalExtension();
    $request->image->move(public_path('uploads/resumes/gallery'), $filename);

    $resume->images()->create([
        'image' => $filename,
        'alt' => $request->alt,
    ]);

    return redirect()->route('Projects')->with('success', 'تصویر به گالری پروژه اضافه شد.');
}

public function gallery($id)
{
    // پیدا کردن پروژه بر اساس id
    $resume = Resume::findOrFail($id);

    // گرفتن تصاویر مربوط به پروژه
    $galleryImages = $resume->images;

    // بازگشت به صفحه گالری و ارسال داده‌ها
    return view('AdminViews.Projects.Gallery', compact('resume', 'galleryImages'));
}

}
