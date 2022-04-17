<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Courses;
use App\Models\Task;

class Project extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='project';
    protected $fillable = [
        
        'id',
        'student_id',
        'courses_id',
        'title'
    ];


    public function Courses(){
        return $this->belongsTo(Courses::class);
    }

    public function Task()
    {
        return $this->hasMany(Task::class);
    }

}
