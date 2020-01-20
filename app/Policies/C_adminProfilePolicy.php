<?php

namespace App\Policies;

use App\C_adminProfile;
use App\C_admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class C_adminProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the c_admin can view any c_admin profiles.
     *
     * @param  \App\C_admin  $c_admin
     * @return mixed
     */
    public function viewAny(C_admin $c_admin)
    {
        //
    }

    /**
     * Determine whether the c_admin can view the c_admin profile.
     *
     * @param  \App\C_admin  $c_admin
     * @param  \App\C_adminProfile  $cAdminProfile
     * @return mixed
     */
    public function view(C_admin $c_admin, C_adminProfile $cAdminProfile)
    {
        //
    }

    /**
     * Determine whether the c_admin can create c_admin profiles.
     *
     * @param  \App\C_admin  $c_admin
     * @return mixed
     */
    public function create(C_admin $c_admin)
    {
        //
    }

    /**
     * Determine whether the c_admin can update the c_admin profile.
     *
     * @param  \App\C_admin  $c_admin
     * @param  \App\C_adminProfile  $cAdminProfile
     * @return mixed
     */
    public function update(C_admin $c_admin, C_adminProfile $cAdminProfile)
    {
               return $c_admin->id == $cAdminProfile->c_admin_id;
    }

    /**
     * Determine whether the c_admin can delete the c_admin profile.
     *
     * @param  \App\C_admin  $c_admin
     * @param  \App\C_adminProfile  $cAdminProfile
     * @return mixed
     */
    public function delete(C_admin $c_admin, C_adminProfile $cAdminProfile)
    {
        //
    }

    /**
     * Determine whether the c_admin can restore the c_admin profile.
     *
     * @param  \App\C_admin  $c_admin
     * @param  \App\C_adminProfile  $cAdminProfile
     * @return mixed
     */
    public function restore(C_admin $c_admin, C_adminProfile $cAdminProfile)
    {
        //
    }

    /**
     * Determine whether the c_admin can permanently delete the c_admin profile.
     *
     * @param  \App\C_admin  $c_admin
     * @param  \App\C_adminProfile  $cAdminProfile
     * @return mixed
     */
    public function forceDelete(C_admin $c_admin, C_adminProfile $cAdminProfile)
    {
        //
    }
}
