<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;
use App\Models\Projects\Agreement;
class Minuta extends Model
{
    public function agreements(){
        return $this->hasMany(Agreement::class,'minuta_id','id');
    }
}
