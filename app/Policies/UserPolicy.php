<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function view(User $user, User $model): bool
    {
        // if($model->role !== 'admin')
        //     return false;
        
        return $model->role === User::ROLE_ADMIN;
    }
}
