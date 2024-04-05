<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department; 

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculty';
    public $timestamps = false;
    protected $fillable = [
        'first_name',
        'last_name',
        'department_id',
        'phone',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}