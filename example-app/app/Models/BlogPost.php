<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class BlogPost extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'author_id', 'featured_image', 'published_at',
        'is_published', 'meta_title', 'meta_description', 'focus_keyword', 'tags'
    ];

    // ارتباط با جدول کاربران (یک نویسنده برای هر پست)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // تابعی برای نمایش تاریخ شمسی
    public function getJalaliCreatedAtAttribute()
    {
        return Jalalian::fromDateTime($this->created_at)->format('Y/m/d H:i');
    }
}
