<?php

namespace App\Policies;

use App\Entities\User;
use App\Entities\Example;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExamplePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return true;
    }

    public function view(User $user, Example $example)
    {
        return true;
    }

    /**
     * Determine whether the user can create examples.
     *
     * @param  \App\Entities\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the example.
     *
     * @param  \App\Entities\User  $user
     * @param  \App\Example  $example
     * @return mixed
     */
    public function update(User $user, Example $example)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the example.
     *
     * @param  \App\Entities\User  $user
     * @param  \App\Example  $example
     * @return mixed
     */
    public function delete(User $user, Example $example)
    {
        return true;
    }
}
