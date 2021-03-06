<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class C_admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'c_admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','college',
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

    public function c_admin_profile(){
        return $this->hasOne(C_adminProfile::class);
    }

     protected static function boot(){
        parent::boot();
        static::created(function( $c_admin){
            $c_admin->c_admin_profile()->create([
            //    'url'=>'https://yourlinkedinProfileLink',
                'verified'=>0,
                'rejected'=>0,
                'image'=>'/profile/1.jpg'
            ]);
        });
    }

}
