<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeImage extends Model
{
    protected $fillable = ['resume_id', 'image', 'alt'];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
