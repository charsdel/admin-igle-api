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
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);


        $user = User::where('email', $request->email)->first();
 
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
            $success['name'] =  $user->name;
   
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $user = User::where('email', $request->email)->first();
        if(! $user)
        {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
   
            return $this->sendResponse($success, 'User register successfully.');
        }else{
            return $this->sendError('existing user', ['error'=>'existing user']);
        }
   
        
    }
}
