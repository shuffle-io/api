<?php

namespace App\Api\V1\Http\Controllers;

use App\Api\V1\Http\Requests\User\UserUpdate;
use App\Entities\User;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
    protected function model()
    {
        return User::class;
    }

    protected function transformer()
    {
        return UserTransformer::class;
    }

    protected function message()
    {
        return "User not found";
    }

    /**
     * Find all users
     *
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return $this->response->collection(
            $users, 
            $this->transformer(), 
            $this->parameters()
        );
    }

    /**
     * Find user by ID
     *
     * @return \Dingo\Api\Http\Response
     */
    public function show(User $user)
    {
        return $this->response->item(
            $user, 
            $this->transformer(),
            $this->parameters(), 
            $this->callable()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdate  $request
     * @param  int  $id
     * @return \Dingo\Api\Http\Response
     */
    public function update(UserUpdate $request, User $user)
    {
        $user->update($request->except("password"));

        return $this->response->item(
            $user, 
            $this->transformer(),
            $this->parameters()
        );
    }
}
