<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    use HandlesAuthorization;

    // This checks if the current user is in the CAN_DELETE list of the .env file

    public function delete(User $user)
    {
        $allowedUsers = explode(' ', env('CAN_DELETE'));
        return (in_array($user->username, $allowedUsers));
    }

}
