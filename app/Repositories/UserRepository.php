<?php
namespace App\Repositories;
use App\Models\User;

class UserRepository {
    public function getAllUser(){
        return User::get();
    }
    public function updateUser($validation,$user){
        return $user->update($validation);
    }
}
?>