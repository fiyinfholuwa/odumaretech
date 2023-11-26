<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function cat()
    {
      return $this->hasOne(Category::class, 'id', 'category');
    }

    public function cohort()
    {
      return $this->hasOne(Cohort::class, 'id', 'cohort');
    }
}
