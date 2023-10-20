<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Crud_Model;
use Illuminate\Support\Facades\Mail;

class Crud_Laravel extends BaseController
{
    public function index()
    {
        return view('crud_form');
        // return view('index_1');
        // $products = Crud_Model::latest()->paginate(5);
        // // print_r($products);exit;
    
        // return view('index_1',compact('products'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // public function Create()
    // {
    //     return view('crud_form');
    // }

    public function Insert_Data(Request $request)
    {
        // echo '<pre>';
        // print_r($_POST);
        // EXIT;

        // print_r($request);exit;
        // return view('crud_form');
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required',
            'file' => 'required|image',
            // 'file' => 'required|image',
        ]);
        
        $input = $request->all();
        // $input = $request->file('file');
        // echo "<pre>";
        // print_r($input);exit;
        $fileName = $input['file']->getClientOriginalName();        
        
        // if ($image = $request->file('file')) {
            if ($image = $request['file']) {
                // $destinationPath = $fileName;
                $destinationPath = $fileName;
                // $destinationPath = 'E:/Laravel/';
                // print_r($destinationPath);exit;
                // $destinationPath = 'image/';
                // $profileImage = $fileName;
                // $profileImage = $request->file('file')->getClientOriginalExtension();
                // $fileName = $input['file']->getClientOriginalName();
                $image->move($destinationPath);
                $input['file'] = $destinationPath;
                // print_r($input['file']);exit;
        }    
            Crud_Model::create($input);
        // return redirect()->route('/Crud_AA')->with('success','Product created successfully.');

        return redirect('/Show')->with('success','Data created successfully.');
    }

    public function Show(Request $request)
    {
        $users = Crud_Model::paginate(4);
        $request->Session()->put('ShowData',$users);
        return view('index_1',compact('users','users'));
    }

    public function Edit(Crud_Model $crudmodel)
    {
        return view('edit',compact('crudmodel'));
    }
}
