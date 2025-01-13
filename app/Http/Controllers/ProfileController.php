<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function handleProfilePicture(Request $request, string $id) {
        $user = User::findOrFail($id);
        $user_action = $request->input('action');
        switch ($user_action) {
            // add profile
            case 'add':
                if ($user->profile_picture === null) {
                    $request->validate([
                        'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:9048'],
                    ]);
                    // change file image name
                    $image = time() . '.' . $request->file('profile_picture')->extension();
                    $path = $request->file('profile_picture')->storeAs('profile_picture', $image, 'public');
                    // save profile in our records
                    $user->profile_picture = $path;
                    $user->save();
                    return redirect()->back()->with('editProfile', 'profile picture has been added successfully');
                }
                break;
            // update profile
            case 'update':
                $profile_picture = $user->profile_picture;
                $path = null;
                if ($user->profile_picture !== null) {
                    // validate profile
                    $request->validate([
                        'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:9048'],
                    ]);
                    if ($request->hasFile('profile_picture')) {
                        // delete first image then update
                        Storage::disk('public')->delete($user->profile_picture);
                        // update with new picture
                        $image = time() . '.' . $request->file('profile_picture')->extension();
                        $path = $request->file('profile_picture')->storeAs('profile_picture', $image, 'public');
                    } else {
                        $path = $profile_picture;
                    }
                }
                User::where('id', $id)->update([
                    'profile_picture' => $path
                ]);
                return redirect()->back()->with('editProfile', 'profile picture has been updated successfully');
                break;
            // delete profile
            case 'delete':
                if ($user->profile_picture !== null) {
                    $profile_picture = $user->profile_picture;
                    if ($profile_picture) {
                        Storage::disk('public')->delete($profile_picture);
                    }
                    User::where('id', $id)->update([
                        'profile_picture' => null
                    ]);
                    return redirect()->back()->with('editProfile', 'profile picture has been deleted successfully');
                }
                break;
            default:
                dd('no action found');
                break;
        }
    }

    //update user infomation
    public function saveInfo(Request $request, string $id) {
        $data = $request->validate([
            'name' => ['required', 'max:50', 'regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::id()],
            'location' => ['required', 'string'],
            'bio' => ['required', 'string', 'max:300', 'min:10'],
        ]);
        // save updated values
        User::where('id', $id)->update($data);
        return redirect()->back()->with('editProfile', 'your information has been updated succesfully');
    }

    // update user password
    public function updatePassword(Request $request, string $id){
        $user = User::findOrFail($id);
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        //check if the current password matches the stored hashed password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('editProfileError', 'The current password is not correct');
        }

        //check if new password as same as the old one
        if (Hash::check($request->input('password'), $user->password)) {
            return redirect()->back()->with('editProfileError', 'The new password cannot be the same as the old one');
        }

        // save password
        $user->password = Hash::make($request->input('password'));
        $isUpdated =  $user->update();
        if ($isUpdated) {
            return redirect()->back()->with('editProfile', 'Password updated successfully');
        }
    }

    //Add social links of the author user
    public function addSocialLinks(Request $request, string $id){
        $data = $request->validate([
            'profile' => ['url', 'starts_with:https://', 'min:10', 'max:60'],
            'facebook' => ['url', 'starts_with:https://', 'min:10', 'max:60'],
            'instagram' => ['url', 'starts_with:https://', 'min:10', 'max:60'],
            'website' => ['url', 'starts_with:https://', 'min:10', 'max:60'],
        ]);
        // save link is our records
        $isSaved = User::where('id', $id)->update($data);
        // check is saved successfully and return a alert message
        if ($isSaved) {
            return redirect()->back()->with('editProfile' , 'Your social media saved successfully');
        }else{
            return redirect()->back()->with('editProfileError' , 'Please make sure everything is works fine');
        }
    }


    public function changeVisibility(Request $request, string $id){
        // grab user status
        $visibility = $request->input('visibility');

        // update account status in DB and store it in variable to check it
        $isChanged = User::where('id', $id)->update([
            'visibility' => $request->input('visibility'),
        ]);

        // check if update was successfully proceeded and show alert message for user
        if ($isChanged) {
            return redirect()->back()->with('editProfile', 'You have changed your account visibility to ' . $visibility . ' successfully');
        } else {
            return redirect()->back()->with('editProfileError', 'Sorry we could not proceed thid account right now, Please try again');
        }

    }


    public function destroyAccount(string $id){
        $user = User::findOrfail($id);
        $isDeleted = User::where('id', $id)->delete();
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }
        if ($isDeleted) {
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }


    // display user profile to public and audience
    public function author(string $id)
    {
        $user = User::with(['following.author'])->findOrFail($id);
        $posts = Post::where('user_id', $id)->where('status', 'published')->latest()->simplePaginate('5');
        $total = Post::where('user_id', $id)->where('status', 'published')->count();
        return view('dashboard.author', compact('user', 'posts', 'total'));
    }
}
