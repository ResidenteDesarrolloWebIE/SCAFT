<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;
use App\Models\Projects\Project;
class TechnicalAdvance extends Model
{
    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }
}
