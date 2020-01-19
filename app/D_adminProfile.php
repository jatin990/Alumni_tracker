<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class D_adminProfile extends Model
{

    protected $guarded = [];

    public function d_admin(){
        return $this->belongsTo(D_admin::class);
    }
     public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'd_admin_profile/5nxZgeK0tDXGE9rVaJa8MeZsvgHuvfKXpMdWrSMY.png';

        return '/storage/' . $imagePath;
    }
}
