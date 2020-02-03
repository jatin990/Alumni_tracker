<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class D_admin extends Authenticatable
{
    use Notifiable;

        protected $guard = 'd_admin';

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

    public function d_admin_profile(){
        return $this->hasOne(D_adminProfile::class);
    }

     protected static function boot(){
        parent::boot();
        static::created(function( $d_admin){
            $d_admin->d_admin_profile()->create([
                'image'=>'/profile/1.jpg'
            ]);
        });
    }
}
