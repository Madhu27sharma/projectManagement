<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['project_id', 'title', 'description', 'due_date', 'is_completed'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
