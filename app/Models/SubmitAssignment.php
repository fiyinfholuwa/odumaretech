<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitAssignment extends Model
{
    use HasFactory;
    public function course_name()
    {
      return $this->hasOne(Course::class, 'id', 'course_id');
    }

    public function assignment_name()
    {
      return $this->hasOne(Assignment::class, 'id', 'assessment_id');
    }
}
