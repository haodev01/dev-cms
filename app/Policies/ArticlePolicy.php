<?php

namespace App\Policies;

use App\Helpers\PermissionHelper;
use App\Models\Admin;
use App\Models\Article;

class ArticlePolicy
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
        return $admin->hasPermissionTo(PermissionHelper::VIEW_ARTICLE);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $admin)
    {
        return $admin->hasPermissionTo(PermissionHelper::CREATE_ARTICLE);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin)
    {
        return $admin->hasPermissionTo(PermissionHelper::EDIT_ARTICLE);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin)
    {
        return $admin->hasPermissionTo(PermissionHelper::DELETE_ARTICLE);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin)
    {
        //
    }
}
