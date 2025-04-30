<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id(); // کلید اصلی
            $table->string('title'); // عنوان پست وبلاگ
            $table->string('slug')->unique(); // اسلاگ برای لینک‌های سئو
            $table->text('content'); // محتوای پست
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade'); // نویسنده پست
            $table->string('featured_image')->nullable(); // تصویر شاخص
            $table->timestamp('published_at')->nullable(); // تاریخ انتشار
            $table->boolean('is_published')->default(false); // آیا پست منتشر شده است؟
            // فیلدهای سئو
            $table->string('meta_title')->nullable(); // عنوان متا
            $table->text('meta_description')->nullable(); // توضیحات متا
            $table->string('focus_keyword')->nullable(); // کلمه کلیدی اصلی
            $table->string('tags')->nullable(); // تگ‌های مرتبط

            $table->timestamps(); // تاریخ ایجاد و بروزرسانی
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
