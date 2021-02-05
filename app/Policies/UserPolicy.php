<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

   function managePatients(User $user){
        return $user->role_id !== 1 && $user->role_id !== 4;
   }

   function manageSystem(User $user){
       return $user->role_id === 1;
   }

   function accessPortal(User $user){
       return $user->is_verified === 1;
   }
   function accessWebsite(User $user){
       return $user->role_id === 4;
   }
   function hasVerifiedEmail(User $user){
       return $user->hasVerifiedEmail();
   }
}
