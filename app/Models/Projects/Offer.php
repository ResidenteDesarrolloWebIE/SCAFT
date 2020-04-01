<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;
use App\Models\Projects\File;

class Offer extends Model
{
    protected $with = ['file']; 

    public function file(){
        return $this->belongsTo(File::class,'file_id','id');
    }
}
