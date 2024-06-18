<?php

namespace App\Policies;

use App\Helpers\PermissionHelper;
use App\Models\Admin;
use App\Models\Tag;

class TagPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $admin)
    {
        //
        return $admin->hasPermissionTo(PermissionHelper::VIEW_TAG);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $admin)
    {
        return $admin->hasPermissionTo(PermissionHelper::CREATE_TAG);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin, Tag $tag)
    {
        return $admin->hasPermissionTo(PermissionHelper::EDIT_TAG);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin, Tag $tag)
    {
        return $admin->hasPermissionTo(PermissionHelper::DELETE_TAG);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin, Tag $tag)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin, Tag $tag)
    {
        //
    }
}
