<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;
use App\Models\Projects\AditionalDetails;
use App\Models\Projects\AffiliationProject;
use App\Models\Projects\EconomicAdvance;
use App\Models\Projects\TechnicalAdvance;
use App\Models\Projects\ProjectType;
use App\Models\Projects\Offer;
use App\Models\Projects\PurchaseOrder;
use App\Models\Projects\File;
use App\Models\Projects\Coin;
use App\Models\Projects\Image;
use App\User;
use App\Models\Projects\Minuta;
use SoftDeletes;


class Project extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = 'projects';
    /* protected $with = ['customer']; */

    public function customer(){
        return $this->belongsTo(User::class,'customer_id','id');
    }
    public function type(){
        return $this->belongsTo(ProjectType::class,'project_type_id','id');
    }
    public function affiliations(){
        return $this->belongsToMany(Project::class,'affiliation_projects','project_id','affiliation_project_id');
    }
    public function coin(){
        return $this->belongsTo(Coin::class,'coin_id','id');
    }
    public function economicAdvances(){
        return $this->belongsTo(EconomicAdvance::class,'id','project_id');
    }
    public function technicalAdvances(){
        return $this->belongsTo(TechnicalAdvance::class,'id','project_id');
    }
    
    public function images(){
        return $this->hasMany(Image::class,'project_id','id');
    }
    public function offer(){
        return $this->belongsTo(Offer::class,'id','project_id');
    }
    public function purchaseOrder(){
        return $this->belongsTo(PurchaseOrder::class,'id','project_id');
    }
    public function minutes(){
        return $this->hasMany(Minuta::class,'project_id', 'id');
    }
    public function aditionals_details(){
        return $this->hasMany(AditionalDetails::class,'project_id', 'id');
    }
}
