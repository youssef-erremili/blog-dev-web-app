<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->intended()->with('success', 'you log in');
        } else {
            return back()->withErrors([
                'failed' => 'Your credentials do not match our records.'
            ]);
        }
    }


    // login user
    public function register(Request $request)
    {
        $field = $request->validate([
            'name' => ['required', 'max:255', 'regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/'],
            'email' => ['required', 'email', 'unique:users'],
            'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'password' => ['required', 'confirmed']
        ], [
            'name.regex' => 'The full name must contain at least two words.'
        ]);

        // upload picture
        $image = time() . '.' . $request->file('profile_picture')->extension();
        $path = $request->file('profile_picture')->storeAs('profile_picture', $image, 'public');
        
        // save user to database
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
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