<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ShopInformation;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function registerShop(Request $request){
    // dd($request);

        $validator = Validator::make($request->all(), [
            'country' => 'required',
        ], [
            'country.required' => 'country is required.',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        // dd($request->phone);

        $user = User::create([
            'name' => $request->owner_name,
            'phone' => $request->phone,
        ]);

        if($user){
            $shop_info = ShopInformation::create([
                'country' => $request->country,
                'division' => $request->division,
                'township' => $request->township,
                'city_and_village' => $request->city_and_village,
                'street_and_road' => $request->street_and_road,
                'no' => $request->no,
                'shop_name' => $request->shop_name,
                'user_id' => $user->id,
                'applicant_type' => $request->applicant_type,
                'applicant_name'=>$request->applicant_name,

            ]);

            if($request->file('shop_image')){
                $shopImage = $request->file('shop_image');
                $path = $shopImage->storeAs('shope_image', 'user_' . $user->id . '.' . $shopImage->extension(), 'public');
                $shop_info->shop_image = $path;

                $shop_info->save();
            }
        }

        return response()->json(['shop' => $shop_info,'user' => $user], 200);
    }
}
