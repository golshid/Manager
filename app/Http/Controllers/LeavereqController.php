<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Leavereq;
use App\User;
use Auth;
use Session;
use Redirect;

class LeavereqController extends Controller
{
    public function create(Request $request)
    {
        $r = request();
        $this->validate($r, [
            'DateFrom' => 'required',
            'DateTo' => 'required',
            'reason' => 'required',
            'comment' => 'required'
        ]);

        Leavereq::create([
            'user_name' => Auth::user()->name,
            'user_id'=> Auth::user()->id,
            'user_company' => Auth::user()->company,
            'status' => 0,
            'date_from' => $r->DateFrom,
            'date_to' => $r->DateTo,
            'reason' => $r->reason,
            'comment' => $r->comment
        ]);

        Session::flash('success', 'Request created.');
        return view('/home');
    }

    public function allrequests() {
        if(Auth::user()->admin == 1){
            $pendingrequests = Leavereq::where('user_company', Auth::user()->company)->where('status','=',0)->orderBy('created_at', 'desc')->paginate(3);
            $approvedrequests = Leavereq::where('user_company', Auth::user()->company)->where('status','=', 1)->orderBy('created_at', 'desc')->paginate(3);
            $rejectedrequests = Leavereq::where('user_company', Auth::user()->company)->where('status','=', 2)->orderBy('created_at', 'desc')->paginate(3);

            return view('leavereqinbox')->with('pendingrequests', $pendingrequests)->with('approvedrequests', $approvedrequests)->with('rejectedrequests', $rejectedrequests);
        }
        else {
            $requests = Leavereq::where('user_name', Auth::user()->name)->orderBy('created_at', 'desc')->paginate(3);
            return view('leavereqinbox')->with('requests', $requests);
            
        }
    }

    public function rejectreq($id){
        $req = Leavereq::find($id);
        $req->status = 2;
        $req->save();
        return redirect()->back();

    }

    public function acceptreq($id){
        $req = Leavereq::find($id);
        $req->status = 1;
        $req->save();
        return redirect()->back();
    }

    public function showreqadmin($id)
    {
        $req = Leavereq::find($id);
        $admin = User::where('company', '=', Auth::user()->company)->where('admin', '=', 1)->first();
        return view('AdminLeaveReq')->with('r', $req)->with('admin', $admin);
    }

    public function showrequser($id)
    {
        $req = Leavereq::find($id);
        $admin = User::where('company', '=', Auth::user()->company)->where('admin', '=', 1)->first();
        return view('UserLeaveReq')->with('r', $req)->with('admin', $admin);
    }

    public function createrespond(Request $request,$id)
    {
        $req = Leavereq::find($id);
        $this->validate($request, [
            'admin_cm' => 'required'
        ]);
        $req->admin_cm = $request->admin_cm;
        $req->save();
        return redirect()->back();
    }

}
