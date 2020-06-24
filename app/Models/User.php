<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 
       'role_id',
       'name', 
       'surname',
       'email', 
       'phone', 
       'password', 
       'birth_date'
   
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

    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class);
    }

    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }

    
    public function image()
    {
        return $this->morphOne(\App\Models\Image::class, 'imageable');
    }
//мутаторы
    public function setFirstNameAtribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    // public function getFirstNameAttribute() 
    // {
    //     return "First name:" . ucfirst($this->attributes['name']);
    // }

    public function getIsAdminAttribute()
    {
       return $this->role->name === config('roles.admin');
    }

    public function getIsUserAttribute()
    {
       return $this->role->name === config('roles.customer');
    }
}



