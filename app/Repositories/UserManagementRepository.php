<?php

namespace App\Repositories;

use App\Models\User;

class UserManagementRepository
{
    // Get all users
    public function getUsers()
    {
        return User::whereNull('deleted_at')->get();
    }

    // Optional: Get users with pagination (better for tables)
    public function getUsersPaginated($limit = 10)
    {
        return User::paginate($limit);
    }
}