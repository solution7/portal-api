<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\UpdateProfileRequest;

use App\User;

class ProfileController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $user = $request->user('api');
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response($user, 200);
    }
}
