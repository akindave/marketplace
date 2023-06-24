<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductItem;
use App\Models\ShoppingCartItem;
use App\Http\Requests\SaveCartRequest;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CartController extends BaseController
{
    //
    public function save_cart_items(Request $request){

        // $validatedData = $request->validated();
        // $decodedData = json_decode($validatedData['shopping_cart_item']);
        $data = $request->json()->all();
        // print_r($data);
        // return;
        $SaveShoppingCart = ShoppingCartItem::insert($data);
        if(!$SaveShoppingCart){
            return $this->sendError('Error Occur with fetching',[]);
        }
        return $this->sendResponse($SaveShoppingCart, 'Shopping Cart item successfully.');

    }

}
