<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUsersProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user/profile/index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $ser)
    {
        $user = Auth::user();

        return view('user/profile/edit', compact('users'));
    }

    public function update(UpdateUsersProfileRequest $request, User $user)
    {

        $user = $request->user();
        //dd($user);
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->email = $request['email'];
  
        $user->save();

        return redirect(route('user.profile'))
            ->with(['status' => 'The profile was successfully updated!']);
    }
}
