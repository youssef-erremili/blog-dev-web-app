<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Errehub\LaravelAlert\AlertFacade as Notifier;

class AuthController extends Controller
{
    // login user
    public function login(Request $request)
    {
        $field = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        //login user
        $login = Auth::attempt($field);

        // try to login user
        if ($login) {
            Notifier::success('Welcome back Mr ' . Auth::user()->name . '!');
            return redirect()->intended();
        } else {
            Notifier::error('Email address or Password are wrong');
            return redirect()->back();
        }
    }


    // login user
    public function register(Request $request)
    {
        $path = null;
        $field = $request->validate([
            'name' => ['required', 'max:255', 'regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/'],
            'email' => ['required', 'email', 'unique:users'],
            'profile_picture' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:9048'],
            'password' => ['required', 'confirmed']
        ], [
            'name.regex' => 'The full name must contain two words.'
        ]);

        // upload picture
        if ($request->hasFile('profile_picture')) {
            $image = time() . '.' . $request->file('profile_picture')->extension();
            $path = $request->file('profile_picture')->storeAs('profile_picture', $image, 'public');
        }

        // save user to database
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->profile_picture = $path;
        $user->save();

        // log in user
        Auth::login($user);

        // redirect intened()
        return redirect()->route('home')
            ->with('success', 'you registered successfully');
    }


    // login user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', "you log out successully");
    }
}
