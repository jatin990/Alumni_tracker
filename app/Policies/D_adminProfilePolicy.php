<?php

namespace App\Policies;

use App\D_adminProfile;
use App\D_admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class D_adminProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the d_admin can view any d_admin profiles.
     *
     * @param  \App\D_admin  $d_admin
     * @return mixed
     */
    public function viewAny(D_admin $d_admin)
    {
        //
    }

    /**
     * Determine whether the d_admin can view the d_admin profile.
     *
     * @param  \App\D_admin  $d_admin
     * @param  \App\D_adminProfile  $dAdminProfile
     * @return mixed
     */
    public function view(D_admin $d_admin, D_adminProfile $dAdminProfile)
    {
        //
    }

    /**
     * Determine whether the d_admin can create d_admin profiles.
     *
     * @param  \App\D_admin  $d_admin
     * @return mixed
     */
    public function create(D_admin $d_admin)
    {
        //
    }

    /**
     * Determine whether the d_admin can update the d_admin profile.
     *
     * @param  \App\D_admin  $d_admin
     * @param  \App\D_adminProfile  $dAdminProfile
     * @return mixed
     */
    public function update(D_admin $d_admin, D_adminProfile $dAdminProfile)
    {
       return $d_admin->id == $dAdminProfile->d_admin_id;

    }

    /**
     * Determine whether the d_admin can delete the d_admin profile.
     *
     * @param  \App\D_admin  $d_admin
     * @param  \App\D_adminProfile  $dAdminProfile
     * @return mixed
     */
    public function delete(D_admin $d_admin, D_adminProfile $dAdminProfile)
    {
        //
    }

    /**
     * Determine whether the d_admin can restore the d_admin profile.
     *
     * @param  \App\D_admin  $d_admin
     * @param  \App\D_adminProfile  $dAdminProfile
     * @return mixed
     */
    public function restore(D_admin $d_admin, D_adminProfile $dAdminProfile)
    {
        //
    }

    /**
     * Determine whether the d_admin can permanently delete the d_admin profile.
     *
     * @param  \App\D_admin  $d_admin
     * @param  \App\D_adminProfile  $dAdminProfile
     * @return mixed
     */
    public function forceDelete(D_admin $d_admin, D_adminProfile $dAdminProfile)
    {
        //
    }
}
