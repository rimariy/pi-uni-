<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        
        'Id',
        'name',
        'email',
        'address',
        'password'
      
    ];


    public function courses(){
        
        return $this->hasManyThrough(Courses::class,Studentstable::class,'studentID','id','Id','coursID');
    }
}

