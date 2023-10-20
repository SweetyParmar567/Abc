<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wizard_Model;

use Illuminate\Routing\Controller as BaseController;

class DateWiseData extends BaseController
{
    public function index()
    {
        $fromDate = $_POST['fromDate'] ?? date('Y-04-01');
        $toDate = $_POST['toDate'] ?? date('Y-m-d');
        // echo "hiii";exit;
        // $request->validate([
        //     'fromDate' => 'required|date',
        //     'toDate' => 'required|date',
        // ]);
        // print_r($request);exit;

        $fromDate1 = $fromDate . " 00:00:00";
        $toDate1 = $toDate . " 23:59:59";

        // $fromDate = $request->input('fromDate');
        // $toDate = $request->input('toDate');

        $data = Wizard_Model::whereBetween('created_at', [$fromDate1, $toDate1])->get();
        // // echo view('display_data_date',compact('data'));   
        return view('display_data_date',compact('data','fromDate1','toDate1'));
    }

    public function getData(Request $request)
    {   
        //  print_r($_POST);exit;
        $request->validate([
            'fromDate' => 'required|date',
            'toDate' => 'required|date',
        ]);

        $fromDate = $_POST['fromDate'] ?? date('Y-04-01');
        $toDate = $_POST['toDate'] ?? date('Y-m-d');

        $fromDate1 = $fromDate . " 00:00:00";
        $toDate1 = $toDate . " 23:59:59";

        // $fromDate = $request->input('fromDate');
        // $toDate = $request->input('toDate');

        $data = Wizard_Model::whereBetween('created_at', [$fromDate1, $toDate1])->get();
        // echo "<pre>";
        // print_r($data);exit;
        echo view('display_data_date',compact('data','fromDate1','toDate1'));
        // return view('display_data_date',compact('data','fromDate','toDate'));
    }
}
