<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Student extends Model
{
    protected $fillable = [
        'roll_num',
        'first_name', 
        'last_name',
        'department_id',
        'phone',
        'admission_date',
        'cet_marks',
    ];
    protected $primaryKey = 'roll_num';
    public $timestamps = false;
    use HasFactory;
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
