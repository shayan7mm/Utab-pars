<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ResumeImage;

class Resume extends Model
{
    protected $fillable = ['title', 'description', 'featured_image', 'alt'];

    public function images()
    {
        return $this->hasMany(ResumeImage::class);
    }
    
}
