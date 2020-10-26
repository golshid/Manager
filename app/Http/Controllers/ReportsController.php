<?php

namespace App\Http\Controllers;

use App\File;
use App\Reports;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;


class ReportsController extends Controller
{

    public function reportCreate()
    {
        return view('reportsupload');
    } 

    public function allreports()
    {
        if (Auth::user()->admin == 1) {
            $reports = Reports::where('user_company', Auth::user()->company)->orderBy('created_at', 'desc')->paginate(3);
            
            return view('ReportsHomePage')->with('reports', $reports);

        } else {
            $reports = Reports::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(3);
            return view('ReportsHomePage')->with('reports', $reports);
        }
    }

    public function showReport($id){
        $report = Reports::find($id);
        $admin = User::where('company', '=', Auth::user()->company)->where('admin', '=', 1)->first();
        $files = File::where('report_id', '=',$id)->get();
        return view('ViewReport')->with('r', $report)->with('admin', $admin)->with('files',$files);

    }
}
