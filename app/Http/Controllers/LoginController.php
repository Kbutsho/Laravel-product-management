<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function ShowLogin()
    {
        return view('pages.auth.login');
    }
    public function Login(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => [
                    'required',
                    'string',
                    'min:5',
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'regex:/[0-9]/',
                    'regex:/[@$!%*#?&]/',
                ],
            ],
            [
                'password.regex' => 'Invalid password formate!',
                'password.required' => 'Password is required!',
                'email.required' => 'Email is required!',
                'email.email' => 'Invalid email address!',
            ]
        );
        $check = User::where([
            ['email', '=', $request->email],
            ['password', '=', $request->password]
        ])->first();
        if ($check) {
            if ($check->status == "pending") {
                return redirect()->route('/login')
                ->with('warning',"your account is not approved! try again later!");
            } else {
                session([
                    'id' => $check->id,
                    'name' => $check->name,
                    'email' => $check->email,
                    'role' => $check->role
                ]);
                return redirect()->route('/dashboard');
            }
        }else{
            return redirect()->route('/login')
                ->with('warning',"user not found!");
        }
    }
}
