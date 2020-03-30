<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;
use App\Models\Projects\AffiliationProject;
use App\Models\Projects\EconomicAdvance;
use App\Models\Projects\TechnicalAdvance;
use App\Models\Projects\File;
use App\Models\Projects\Image;
use App\User;
use App\Models\Projects\Minuta;
use SoftDeletes;


class Project extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = 'projects';
    protected $with = ['customer'];

    public function customer(){
        return $this->belongsTo(User::class,'customer_id','id');
    }
    public function affiliations(){
        return $this->hasMany(AffiliationProject::class,'id','project_id');
    }
    public function economicAdvances(){
        return $this->belongsTo(EconomicAdvance::class,'id','project_id');
    }
    public function technicalAdvances(){
        return $this->belongsTo(TechnicalAdvance::class,'id','project_id');
    }
    public function files(){
        return $this->hasMany(File::class,'id','project_id');
    }
    public function images(){
        return $this->hasMany(Image::class,'id','project_id');
    }

    public function minutes(){
        return $this->hasMany(Minuta::class,'project_id', 'id');
    }
}