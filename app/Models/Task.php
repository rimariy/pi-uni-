<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Task extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='task';
    protected $fillable = [
        'id',
        'project_id',
        'name',
        'order',
        'status'
    ];


    public function Project()
    {
        return $this->belongsTo(Project::class);
    }

}

