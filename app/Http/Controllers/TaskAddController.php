<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddTask;
use App\Models\Wizard_Model;
use Illuminate\Support\Facades\Mail;

use Illuminate\Routing\Controller as BaseController;

class TaskAddController extends BaseController
{
    public function index()
    {
        $wizard  = Wizard_Model::all(); 
        echo view('daily_task',compact('wizard'));
    }

    public function NameData(Request $request) 
	{
        // $selectedValue = $request->input('selectedValue');
        $selectedValue = $request->input('selectedValue');
        // print_r($selectedValue);exit;

        // Perform a query to fetch data based on $selectedValue
        $data = Wizard_Model::where('e_name', $selectedValue)->first();

        return response()->json($data);
    }

    public function addTask(Request $request)
    {
        // print_r($_POST);exit;
        $request->validate([
            'e_id' => 'required',
            'e_name' => 'required',
            'e_email' => 'required|email',
            't_mon' => 'required',
            't_tue' => 'required',
            't_wed' => 'required',
            't_thu' => 'required',
            't_fri' => 'required',
        ]);

        $data = $request->all();
        $task = new AddTask();
        $task->e_id = $data['e_id'];
        $task->e_name = $data['e_name'];
        $task->e_email = $data['e_email'];
        $task->manager_email = $data['manager_email'];
        $task->t_mon = $data['t_mon'];
        $task->t_tue = $data['t_tue'];
        $task->t_wed = $data['t_wed'];
        $task->t_thu = $data['t_thu'];
        $task->t_fri = $data['t_fri'];
        // print_r($task);exit;
        $task->save();

        // $body = [
        //     'title' => $request->get('Task Details'),
        //     'body' => $request->get('Weekly Task of Employee')
        // ];

        $task = [
            'e_id' => $request->get($task['e_id']),
            'e_name' => $request->get($task['e_name']),
            'e_email' => $request->get($task['e_email']),
            't_mon' => $request->get($task['t_mon']),
            't_tue' => $request->get($task['t_tue']),
            't_wed' => $request->get($task['t_wed']),
            't_thu' => $request->get($task['t_thu']),
            't_fri' => $request->get($task['t_fri'])
        ];

        Mail::to($request->get('manager_email'))->send(new \App\Mail\WeeklyReport($task));
        // return redirect('/addData')->with('success','Mail Sent Successfully'); 

        // $task->save();
        // return back()->with('status','Mail Sent successfully');
    }
}
