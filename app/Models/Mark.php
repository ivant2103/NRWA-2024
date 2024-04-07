<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student; 
use App\Models\Subject; 


class Mark extends Model
{
    use HasFactory;
    protected $fillable = ['student_roll_num', 'subject_id', 'marks'];
    public $timestamps = false;
    
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_roll_num', 'roll_num');
    }

    
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
