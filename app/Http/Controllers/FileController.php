<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Reports;
use Auth;
use Session;

class FileController extends Controller
{
    

    

    public function fileStore(Request $request)
    {
        $r = request();
        $this->validate($r, [
            'date' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        $reportid = Reports::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'user_company'=> Auth::user()->company,
            'date' => $r->date,
            'title' => $r->title,
            'content' => $r->content
        ])->id;

        // $myfile = $request->file('file');
        $uploadedfiles = collect($request->file('file'));
        if (! $uploadedfiles->isEmpty()) {
        
        foreach ($request->file('file') as $myfile){
        $fileName = $myfile->getClientOriginalName();
        $myfile->move(public_path('images'),$fileName);
        
        $fileUpload = new File();
        $fileUpload->file_name = $fileName;
        $fileUpload->report_id = $reportid ;
        $fileUpload->save();}
        }

        // return response()->json(['success'=>$fileName]);
        Session::flash('success', 'Report successfully sent.');
        return view('home');
    }
    
    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        File::where('file_name',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }

    public function download($file)
    {
        return response()->download(public_path('images\\' . $file));
    }

}
