<?php

namespace App\Policies;

use App\Models\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
     * Determine if the given post can be updated by the user.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return bool
     */
    public function update(User $user, Post $post) 
    {
        return $user->ownsPost($post);
    }

    /**
     * Determine if the given post can be deleted by the user.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return bool
     */
    public function destroy(User $user, Post $post) 
    {
        return $user->ownsPost($post);
    }
}
