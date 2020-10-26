<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use Auth;
use Session;

class CompanyController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'company' => 'required'
        ]);
        
        $user = User::where('email', Auth::user()->email)->first();
        Company::create([
            'name' => $request->company,
            'admin'=> $user->name,
            'slug' => str_slug($request->company)
        ]);
        User::where('email', Auth::user()->email)
            ->update(['admin' => 1,'company' => $request->company]);

        Session::flash('success', 'Company created.');
        return view('/home');
    }

    public function join(Request $request)
    {
        $this->validate($request, [
            'company' => 'required'
        ]);

        $company = Company::where('name', '=', $request->company)->first();
        if($company == null){
            Session::flash('Error', 'Company does not exist.');
            return redirect()->back();
            }
        else{
        User::where('email', Auth::user()->email)
            ->update(['admin' => 0, 'company' => $request->company]);
        Session::flash('success', 'You successfully joined.');
        return view('/home');}
    }

    public function findAdmin()
    {
        $admin = User::where('company', '=', Auth::user()->company)->where('admin','=',1)->first();
        return view('submitRequests')->with('admin', $admin);
        
    }

        public function findAdmin2()
    {
        $admin = User::where('company', '=', Auth::user()->company)->where('admin','=',1)->first();
        return view('submitLeavereq')->with('admin', $admin);
        
    }

}
