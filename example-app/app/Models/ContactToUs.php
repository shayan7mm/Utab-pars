<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactToUs extends Model
{
    protected $fillable = [
        'name', 'email', 'number', 'message' ];
}
