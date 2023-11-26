<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovedInstructor extends Model
{
    use HasFactory;
    protected $casts = [
        
        'course_ids' => 'array',
      ];
}
