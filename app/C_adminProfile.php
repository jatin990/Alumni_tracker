<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_adminProfile extends Model
{

    protected $guarded = [];

    public function c_admin(){
        return $this->belongsTo(C_admin::class);
    }
     public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'c_admin_profile/1.jpgv    ';
        return '/storage/' . $imagePath;
    }
}