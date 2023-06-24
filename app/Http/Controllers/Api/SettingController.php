<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Resources\ProductCategoryResource;

class SettingController extends BaseController
{
    //fetch the product categories
    public function fetch_all_product_categories(){
        $productCategories = ProductCategory::join('products', 'product_categories.id', '=', 'products.category_id')
        ->leftJoin('product_items', 'products.id', '=', 'product_items.product_id')
        ->select('product_categories.id', 'product_categories.category_name', 'product_categories.slug','product_categories.status','product_categories.category_icon', \DB::raw('COUNT(product_items.id) as total_items'))
        ->groupBy('product_categories.id', 'product_categories.category_name', 'product_categories.slug','product_categories.status','product_categories.category_icon')
        ->get();

        if(!$productCategories){
            return $this->sendError('Error Occur with fetching',[]);
        }

        return $this->sendResponse($productCategories, 'Product categories fetched successfully.');
    }



}
