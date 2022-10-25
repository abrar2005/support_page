<?php

use App\Models\User;

function getUserName($userId)
{
    $user = User::findOrFail($userId);

    $full_name = $user->first_name . ' ' . $user->surname; 

    return $full_name;
}
