<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SignupController extends Controller
{
    public function ShowSignup()
    {
        return view('pages.auth.signup');
    }
    public function Signup(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:4|max:20',
                'email' => 'required|email',
                'role' => 'required',
                'password' => [
                    'required',
                    'string',
                    'min:10',             
                    'regex:/[a-z]/',    
                    'regex:/[A-Z]/',     
                    'regex:/[0-9]/',      
                    'regex:/[@$!%*#?&]/'
                ],
                'confirmPassword' => [
                    'required',
                    'same:password',
                    'min:10'
                ]
            ],
            [
                'confirmPassword.required' => 'Confirm Password is Required!',
                'confirmPassword.same' => 'Confirm Password not match!',
                'password.required' => 'Password is required!',
                'password.regex' => 'Invalid password formate!',
                'password.min' => 'Must contain 10 characters!',
                'name.required' => 'Name is required!',
                'email.required' => 'Email is required!',
                'email.email' => 'Invalid email address!',
                'name.min' => 'Insert more than 4 characters!',
                'name.max' => 'Insert less than  20 characters!',
                'role.required' => 'Select your user role!'
            ]
        );
        $email = $request->email;
        //duplicate user check
        $check = User::where([['email', '=', $email]])->first();
        if ($check) {
            return redirect()->route('/signup')
            ->with('warning',"email already taken!");
        }else{

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role = $request->role;
            $user->status = 'pending';
            $user->save();
            return redirect()->route('/login')
            ->with('success',"registration successful. wait for approval!");
        }
    }
}
