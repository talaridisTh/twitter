<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UploadAvatarPolicy {

    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function action(User $user): bool
    {
        //
    }

}