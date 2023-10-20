<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Routing\Controller as BaseController;

class AjaxController extends BaseController
{
   //  Display a listing of the resource.
   public function index()
   {
        $projects = Project::orderBy('id','desc')->get();
      //   print_r($projects);exit;
        return view('index')->with(compact('projects'));
   }

   // Store a newly created resource in storage.
   public function store(Request $request)
   {
       $data = $request->validate([
           'title' => 'required',
           'description' => 'required'
       ]);

        print_r($data);exit;
       $project = Project::create($data);

      // if(isset($project))
      // {
      //    echo "Data Added Successfully";
      // }

      Response::json($project);
      return redirect()->route('/')->with('success','Data Added Successfully');
      // return redirect("/")->with('success','Data Added Successfully');
   }

   public function Edit()
   {
      return view('edit');
   }

   public function EditData()
   {
      // return view('edit');
   }

   public function DeleteData($id)
   {
      // return view('edit');
      Project::find($id)->delete();
     
      return response()->json(['success'=>'Post deleted successfully.']);
   }
}
