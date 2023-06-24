<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Address;
use App\Models\UserAddress;

class UserController extends BaseController
{

    /**
 * Store a new user.
 *
 * @param  \App\Http\Requests\UpdateUserRequest  $request
 * @return Illuminate\Http\Response
 */
    public function update_user_basic_info(UpdateUserRequest $request){

        // Retrieve the validated input data...
        $validatedData = $request->validated();
        $password = Hash::make($validatedData['password']);
        $user = User::find(Auth::id());
        if(!$user){
            return $this->sendError('Error Occur with fetching',[]);
        }
        $user->password = $password;
        $user->save();
        return $this->sendResponse($user, 'Password updated successfully.');

    }

    public function storeAddress(StoreUserAddressRequest $request){
        $validatedData = $request->validated();

        $online_user = Auth::id();
        $saveAddress = Address::create($validatedData);
        if(!$saveAddress){
            return $this->sendError('Error Occur saving address',[]);
        }
        $defaultExist = UserAddress::whereUserId($online_user)->whereIsDefault(1)->exists();
        $saveUserAddress = UserAddress::create([
            'user_id' => $online_user,
            'address_id' => $saveAddress->id,
            'is_default' => $defaultExist ? 0 : 1
        ]);

        if(!$saveUserAddress){
            $saveAddress->delete();
            return $this->sendError('Error Occur saving user address',[]);
        }
        return $this->sendResponse($saveAddress, 'Address Saved successfully.');



    }

}
