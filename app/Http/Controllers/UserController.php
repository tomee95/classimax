<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8',
            'terms_and_conditions' => 'required'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in.');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }


    public function login()
    {
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function dashboard()
    {
        $userId = auth()->user()->id;

        $ads = Advertisement::where('user_id', $userId)->paginate(2);

        return view('user.dashboard', [
            'ads' => $ads,
            'adCategories' => $this->returnAllAdCategories(),
            'adImages' => $this->returnAllAdImages($ads)
        ]);
    }

    public function myProfile()
    {
        return view('user.user-profile');
    }

    public function save(Request $request, User $user)
    {
        $formField = $request->validate([
            'phone' => 'max: 50',
            'firstname' => 'max: 255',
            'lastname' => 'max: 255',
            'country' => 'max: 255',
            'county' => 'max: 255',
            'city' => 'max: 255',
            'zip_code' => 'max: 6'
        ]);

        if($request->hasFile('profile_picture')) {
            if($user->profile_picture) {
                unlink('storage/' . $user->profile_picture);
            }
            $formField['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->update($formField);

        return back();
    }

    public function passwordChange(Request $request, User $user)
    {
        $validatedFields = $request->validate([
            'current_password' => ['required'],
            'new_password' => 'required|confirmed|min:8'
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is not correct!'])->onlyInput('current_password');
        }

        if (!Hash::check($request->current_password, $request->new_password)) {
            return back()->withErrors(['current_password' => 'The new password must be different from the current password!'])->onlyInput('current_password');
        }

        $formFields['password'] = bcrypt($validatedFields['new_password']);

        $user->update($formFields);

        auth()->login($user);

        return redirect('/my-profile')->with('message', 'Password successfully updated');
    }
}
