<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Company;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsersInfoController extends Controller
{
    public function storeinfo(Request $request,$id)
    {

        $user = User::where('id','=',$id)->first();
        $userinfo = UserInfo::where('user_id','=',$id)->first();
        $company = Company::where('name','=',Auth::user()->company)->first();

        if ($userinfo == null) {

            $userinfo = UserInfo::create($request->all());
            $userinfo-> company_id = $company->id;
            $userinfo->save();
        }
        else {

            $data = $request->all();
            $result = array_filter($data);
            $userinfo-> update($result);
            
        }
        $user->name = $request->username;
        $user->save();
         return redirect()->back();
    }
}
