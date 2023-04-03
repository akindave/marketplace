<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\CountryResource;
use App\Models\Country;

class ApiMisController extends BaseController
{
    //
     //
     public function getAllCountry(){
        return $this->sendResponse(CountryResource::collection(Country::all()), 'Country fetched successfully.');

    }
}
