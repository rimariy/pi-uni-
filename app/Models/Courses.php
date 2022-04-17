<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Courses extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [

        'id',
        'name',
        'prof_name'
      
    ];

    public function Student(){
        return $this->belongsToMany(Students::class)->using(Studentstable::class);
    }

    public function project(){
    
        // return $this->hasOne(Project::class,'course_id','id');
        return $this->hasMany(Project::class,'courses_id','id');
    
    }

}
