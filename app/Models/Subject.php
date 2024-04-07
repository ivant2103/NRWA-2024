<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Faculty;


class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['department_id', 'faculty_id', 'name', 'start_date', 'end_date'];
    public $timestamps = false;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
