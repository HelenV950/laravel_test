<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|requared|unique:user', 
            'password' => 'requared'|min(8)
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
         
        $user->save();

       return redirect()->route('/');
    }
 }
