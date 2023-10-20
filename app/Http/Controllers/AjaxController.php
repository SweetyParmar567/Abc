<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
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

       $project = Project::create($data);
      //  print_r($project);exit;

       $result = [
         'success' => true,
         'message'=> 'Your AJAX processed correctly'
       ] ;
       
       return response($result)->json($project);

      // Response::json($project)->with('success','Data Added Successfully');
      // echo "Data Inserted";
      // return redirect()->route('/')->with('success','Data Added Successfully');
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
      $Delete = Project::find($id);
      // print_r($Delete);exit;
      if(isset($Delete))
      {
         $Delete = Project::destroy($id);
         response()->json();
         return redirect('/ajax')->with('danger', "Data deleted successfully.");
      }
      else{
         echo "bye";exit;
      }
      // Project::find($id)->delete();
     
      // return response()->json(['success'=>'Post deleted successfully.']);
   }
}
// Controller