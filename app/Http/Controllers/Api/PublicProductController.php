<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\ProductItem;
use App\Models\Product;

class PublicProductController extends BaseController
{
    //
    public function load_all_products($count){

        $value = Cache::remember('all_products', 60, function () use ($count) {
            return ProductItem::with(['products.product_category' => function($query){
                $query->select(['id','category_name']);
            },'product_configuration.variation_options'])
            ->inRandomOrder()->whereStatus('approved')->limit($count)
            ->get();
        });

        return $this->sendResponse($value, 'All Product fetched successfully.');

    }

    public function load_product_by_id($id){

        $product = ProductItem::whereId($id)
        ->with('product_configuration.variation_options')
        ->whereStatus('approved')->first();

        if(!$product){
            return $this->sendError('Error Occur with fetching',[]);
        }
        return $this->sendResponse($product, 'Product fetched successfully.');
    }

    public function load_product_by_category($category_id,$count){
        $product = Product::whereCategoryId($category_id)
        ->with(['product_items' => function($query){
            $query->whereStatus('approved')
            ->with('product_configuration.variation_options');
        }])
        ->inRandomOrder()
        ->limit($count)
        ->get();

        if(!$product){
            return $this->sendError('Error Occur with fetching',[]);
        }
        return $this->sendResponse($product, 'Product fetched by category successfully.');
    }



}
