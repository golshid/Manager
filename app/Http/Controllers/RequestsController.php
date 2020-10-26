<?php

namespace App\Http\Controllers;

use App\Requests;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;

class RequestsController extends Controller
{
    public function create(Request $request)
    {
        $r = request();
        $this->validate($r, [
            'DateFrom' => 'required',
            'DateTo' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        Requests::create([
            'user_name' => Auth::user()->name,
            'user_id'=> Auth::user()->id,
            'user_company' => Auth::user()->company,
            'status' => 0,
            'date_from' => $r->DateFrom,
            'date_to' => $r->DateTo,
            'title' => $r->title,
            'content' => $r->content,
            'slug' => str_slug($r->title)
        ]);

        Session::flash('success', 'Request created.');
        return view('/home');
    }

    public function allrequests() {
        if(Auth::user()->admin == 1){
            $pendingrequests = Requests::where('user_company', Auth::user()->company)->where('status','=',0)->orderBy('created_at', 'desc')->paginate(3);
            $approvedrequests = Requests::where('user_company', Auth::user()->company)->where('status','=', 1)->orderBy('created_at', 'desc')->paginate(3);
            $rejectedrequests = Requests::where('user_company', Auth::user()->company)->where('status','=', 2)->orderBy('created_at', 'desc')->paginate(3);

            return view('inbox')->with('pendingrequests', $pendingrequests)->with('approvedrequests', $approvedrequests)->with('rejectedrequests', $rejectedrequests);
        }
        else {
            $requests = Requests::where('user_name', Auth::user()->name)->orderBy('created_at', 'desc')->paginate(3);
            return view('inbox')->with('requests', $requests);
            
        }
    }

    public function rejectreq($id){
        $req = Requests::find($id);
        $req->status = 2;
        $req->save();
        return redirect()->back();

    }

    public function acceptreq($id){
        $req = Requests::find($id);
        $req->status = 1;
        $req->save();
        return redirect()->back();
    }

    public function showreqadmin($id)
    {
        $req = Requests::find($id);
        $admin = User::where('company', '=', Auth::user()->company)->where('admin', '=', 1)->first();
        return view('AdminViewReqs')->with('r', $req)->with('admin', $admin);
    }

    public function showrequser($id)
    {
        $req = Requests::find($id);
        $admin = User::where('company', '=', Auth::user()->company)->where('admin', '=', 1)->first();
        return view('UserViewReqs')->with('r', $req)->with('admin', $admin);
    }

    public function createrespond(Request $request,$id)
    {
        $req = Requests::find($id);
        $this->validate($request, [
            'admin_cm' => 'required'
        ]);
        $req->admin_cm = $request->admin_cm;
        $req->save();
        return redirect()->back();
    }

    
}

