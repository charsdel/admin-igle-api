<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Api\BaseController as BaseController;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Validator;



class LoginController extends BaseController
{
    public function login(Request $request)
    {
     

        
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'device_name' => 'required',
        ]);


        $user = User::where('username', $request->username)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }else{
                return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
            }


            

            /*
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);*/
        }else{
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->username;
   
            return $this->sendResponse($success, 'User login successfully.');
        }


       
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $user = User::where('username', $request->email)->first();
        if(! $user)
        {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->username;
   
            return $this->sendResponse($success, 'User register successfully.');
        }else{
            return $this->sendError('existing user', ['error'=>'existing user']);
        }
   
        
    }
}
