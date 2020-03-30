<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public static $rules = [
        'file' => 'required|mimes:png,gif,jpeg,jpg,bmp'
    ];
    public static $messages = [
        'file.mimes' => 'Formato incorrecto',
        'file.rqeuired' => 'Es requerida la imagen'
    ];
}
