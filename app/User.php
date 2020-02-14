<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable
{
    use Notifiable;
    use SearchableTrait;
    //  if(User->profile->verified===1){

    protected $searchable = [
        'columns' => [
            'users.name' => 10,
            'users.year' => 10,
            // if(Auth::guard('d_admin'))
            'users.college' => 10,
            'users.branch' => 10,
            // 'users.PostalCode' => 10,
            // 'users.Country' => 10,
            // 'users.id' => 10,
        ],
    ];

// }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'college', 'year', 'branch', 'phone_no', 'dateOfBirth',
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

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $user->profile()->create([
                'verified' => 0,
                'rejected' => 0,
                'image' => '/profile/1.jpg',
            ]);
        });
    }
}
