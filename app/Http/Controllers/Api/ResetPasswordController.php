<?php

namespace App\Http\Controllers\Api;

use App\Models\ResetCodePassword;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;



class ResetPasswordController extends Controller
{
    /**
     * Change the password (Setp 3)
     *
     * @param  mixed $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:reset_code_passwords',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // find the code
        $passwordReset = ResetCodePassword::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }
        


        $user = User::firstWhere('email', $passwordReset->email);

        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();
       
        // find user's email 

        // update user password
        //$user->update($request->only('password'));
        
        
        // delete current code 
        $passwordReset->delete();

        return response(['message' =>'password has been successfully reset'], 200);
    }
}



