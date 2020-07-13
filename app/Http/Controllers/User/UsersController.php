<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUsersProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        return view('user/profile/index');
    }





    public function update(UpdateUsersProfileRequest $request, User $user)
    {
       // $user = Auth::user();

        $user->update([
            'name'      => $request->get('name'),
            'surname'   => $request->get('surname'),
            'phone'     => $request->get('phone'),
            'email'     => $request->get('email'),
        ]);

        return redirect(route('user.profile.update'))
            ->with(['status' => 'The profile was successfully updated!']);
    }
}
