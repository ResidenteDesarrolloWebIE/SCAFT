<?php
namespace App\Models\Projects;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projects\File;

class AditionalDetails extends Model{
    public function ofer(){
        return $this->belongsTo(File::class,'offer','id');
    }
    public function purchase_order(){
        return $this->belongsTo(File::class,'purchase_order','id');
    }
}