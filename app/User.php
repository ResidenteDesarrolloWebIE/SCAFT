<?php

namespace App;

use App\Models\Projects\Contact;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswords;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function contacts(){
        return $this->hasMany(Contact::class);
    }
    /*public function products_quotations(){
        return $this->hasMany(Products::class);
    }
    public function services_quotations(){
        return $this->hasMany(Service::class);
    }
    public function roles(){
        return $this->belongsToMany('App\Models\UserDetails\Role')->withTimestamps();
    } */
    public function roles(){
        return User::belongsToMany('App\Models\UserDetails\Role')->withTimestamps();
    }



    /* Metodos para manipular los roles */
    public function authorizeRoles($roles){
        if (User::hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }
    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        }else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }


    public function hasRole($role){
        if (User::roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}