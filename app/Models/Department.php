<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faculty; 
use App\Models\Student; 



class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hod_id',
    ];

    public $timestamps = false;

    public function hod()
    {
        return $this->belongsTo(Faculty::class, 'hod_id');
    }

    public function faculty()
    {
        return $this->hasMany(Faculty::class, 'department_id');
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'department_id');
    }
}