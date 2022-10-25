<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

    public function login()
    {
        if (auth()->check()) {
            return redirect('/alle_tickets');
        }
        return view('auth.login');
    }

    public function sign_up()
    {
        if (auth()->check()) {
            return redirect('/alle_tickets');
        }
        return view('auth.sign_up');
    }

    public function register_login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);


        if (auth()->attempt(request()->only(['email', 'password']))) {

            return redirect('/alle_tickets');
        } else {
            return redirect()->back()->with('fail', "Incorrect email or password. Try again");
        }
    }

    public function register_sign_up(Request $request)
    {
        // dd($request);

        $request->validate(
            [
                'first_name' => ['required', 'string', 'max:10'],
                'surname' => ['required', 'string', 'max:10'],
                'agreements' => ['required'],
                'email' => ['required', 'email', 'max:40', 'unique:users'],
                'password' => [
                    'required',
                    'string',
                    'min:6',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    // 'regex:/[@$!%*#?&]/', // must contain a special character
                ],
            ],
            [
                'password.regex' => "Password must have a number, both uppercase and lowercase letters and a special character",
            ]
        );

        $user = User::create([
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()
                ->route('login')
                ->with('success', 'You have been registered. please login to continue');
        } else {
            return back()->with('fail', 'Something happend. try again later');
        }
    }

    public function verify_user($userID)
    {
        if(auth()->user()->admin_role === 0) abort(404);

        $user = User::findOrFail($userID)->update([
            'is_verified' => 1,
        ]);
        
        if(!$user) return back()->with('fail', "Something happend. Couldn't verify user.");
        
        return back()->with('success', 'user has been verified');
    }

    public function more_info(Request $request)
    {
        $request->validate([
            'occupation' => ['required', 'string'],
            'phone' => ['required', 'regex:/(06)[0-9]/', 'min:10', 'max:10']
        ]);

        $user = User::findOrFail(auth()->user()->id)->update([
            'occupation' => $request->occupation,
            'phone' => $request->phone
        ]);

        if(!$user) return back()->with('fail', "Something happend. Couldn't add more info.");
        
        return back()->with('success', 'Information submited');
    }
}
