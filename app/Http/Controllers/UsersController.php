<?php

namespace App\Http\Controllers;

use Auth;

use Image;
use App\User;
use App\Company;
use App\UserInfo;
use App\Http\Requests;
use Illuminate\Http\Request;
use Redirect;

class UsersController extends Controller
{
    public function create($id)
    {

        $tt = User::find($id);
        $company = $tt->company;
        $userinfo = UserInfo::where('user_id', '=', $id)->first();

        if ($id == Auth::user()->id || (Auth::user()->company == $company && Auth::user()->admin == 1)) {
            return view('profile')->with('userinfo', $userinfo)->with('thisid',$id);
        }
        else {
            return view('home');
        }
        
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $image = $request->file('filename');
        $filename  = time(). Auth::user()->name . '.' . $image->getClientOriginalExtension();
        $path = public_path('storage\\avatars\\' . $filename);
        Image::make($image->getRealPath())->resize(200, 200)->save($path);
        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();

        return back()->with('success', 'Your images has been successfully Upload');
    }


    public function findprofile($id){
        $something = 'profile/' . $id;
        return Redirect::to('/profile/'. $id);

    }

    public function userslist(){
        $users = User::where('company','=',Auth::user()->company)->where('admin', '=', 0)->paginate(5);
        return view('Users')->with('userslist', $users);
    }
}
