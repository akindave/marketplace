<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserRequest;
use Illuminate\Http\Request;

class AuthController extends BaseController
{

    public function loginEmailPass(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $credentials = $validator->validated();
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('oshoffa')->plainTextToken;
            $success['user'] =  $user;
            return $this->sendResponse($success, 'User login successfully.');
        } else {

            $response = ['message' => 'invalid email or password'];
            return $this->sendError('Invalid email or password', $validator->errors());
        }
    }

    public function register(Request $request)
    {
         // Retrieve the validated input data...
         $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'sometimes|email|unique:users',
            'password' => 'required|min:8',
            'mobile_number' => 'required|unique:users',
            'code' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['isVerified'] = true;
        $input['email_verified_at'] = Carbon::now();
        $input['user_category_id'] = 1;
        $user = User::create($input);
        $success['token'] =  $user->createToken('oshoffa')->plainTextToken;
        $success['user'] =  $user;

        return $this->sendResponse($success, 'User register successfully.');

    }
    //

}
