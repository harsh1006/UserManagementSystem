<?php

namespace App\Repositories;
use App\Models\User;

class UserManagementRepository
{
    public function getUsers()
    {
        return User::whereNull('deleted_at')->get();
    }

    public function getEditInfo($id){
        return User::where('id',$id)->get()->first()->toArray();
    }

    public function deleteUser($id){
       $user = User::find($id);
        if ($user) {
            return $user->delete();
        }
        return false;     
    }

    public function getUsersPaginated($limit = 10)
    {
        return User::paginate($limit);
    }
}