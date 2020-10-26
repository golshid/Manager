<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Invite;
use App\UserInfo;
use App\Mail\InviteCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;

class InviteController extends Controller
{
    public function process(Request $request)
{

    if (User::where('email',$request->get('email'))->first()) {
        Session::flash('message', $request->get('email'). ' already exists.');
    }
    else {
        do {
            $token = str_random();
        } 
        while (Invite::where('token', $token)->first());
        $invite = Invite::create([
            'email' => $request->get('email'),
            'company'=>Auth::user()->company,
            'token' => $token
        ]);
        Mail::to($request->get('email'))->send(new InviteCreated($invite));
        Session::flash('message', 'Successfully invited '.$request->get('email'));
    }
    return redirect()
        ->back();
}


    public function accept($token)
{
    if (!$invite = Invite::where('token', $token)->first()) {
        abort(404);
    }
    do {
    $username = str_random();
    } 
    while (User::where('name', $username)->first());

    $password = str_random();
    $email = $invite->email;
    $user = User::create(['email' => $invite->email,
            'company'=>$invite->company,
            'name'=>$username,
            'password'=>Hash::make($password),
            'admin'=>0,
    ]);

     UserInfo::create([
            'user_id'=>$user->id,
        ]);

    $invite->delete();

     return view('/inviteaccepted')->with('password',$password)->with('email',$email);
}


}
