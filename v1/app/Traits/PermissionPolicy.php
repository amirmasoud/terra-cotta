<?php

namespace App\Traits;

use App\User;

trait PermissionPolicy
{
    /**
     * Determine whether the user can browse the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function browse(User $user)
    {
        return $user->hasPermissionTo("browse {$this->modelName}");
    }

    /**
     * Determine whether the user can read the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user, $model)
    {
        $model = new $this->modelClass;
        return $user->hasPermissionTo("view {$this->modelName}");
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo("create {$this->modelName}");
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, $model)
    {
        $model = new $this->modelClass;
        return $user->hasPermissionTo("update {$this->modelName}");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, $model)
    {
        $model = new $this->modelClass;
        return $user->hasPermissionTo("delete {$this->modelName}");
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, $model)
    {
        $model = new $this->modelClass;
        return $user->hasPermissionTo("restore {$this->modelName}");
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, $model)
    {
        $model = new $this->modelClass;
        return $user->hasPermissionTo("force delete {$this->modelName}");
    }
}
