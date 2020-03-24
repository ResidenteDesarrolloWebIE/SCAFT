<?php

namespace App\Models\Projects;
use App\Models\Projects\Project;
use Illuminate\Database\Eloquent\Model;

class AffiliationProject extends Model
{
    public function projects(){
        return $this->hasMany(Project::class,'project_id','id');
    }
}
