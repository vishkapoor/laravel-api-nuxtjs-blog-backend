<?php

namespace App\Policies;

use App\Models\Topic;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given topic title can be updated by the user.
     *
     * @param  User  $user
     * @param  Topic  $topic
     * @return bool
     */
    public function update(User $user, Topic $topic) 
    {
        return $user->ownsTopic($topic);
    }

    /**
     * Determine if the given topic title can be deleted by the user.
     *
     * @param  User  $user
     * @param  Topic  $topic
     * @return bool
     */
    public function destroy(User $user, Topic $topic) 
    {
        return $user->ownsTopic($topic);
    }
}
