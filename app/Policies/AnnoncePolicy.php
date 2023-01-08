<?php

namespace App\Policies;

use App\Models\Annonce;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnnoncePolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Annonce $post)
    {
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Annonce $post)
    {
        return $user->id === $post->user_id;
    }
}
