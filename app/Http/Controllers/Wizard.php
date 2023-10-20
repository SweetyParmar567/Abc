<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Wizard_Model;
use NumberFormatter;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;

use Illuminate\Routing\Controller as BaseController;

class Wizard extends BaseController
{
    protected $fpdf;

    public function index()
    {
        $wizard  = Wizard_Model::all(); 
        return view('wizard',compact('wizard'));
    }

    public function DataInsert(Request $request) 
	{
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'type' => 'required',
        ]);
        // print_r($_POST);exit;
		$wizard = new Wizard_Model;
        $wizard->code = $request->code;
        $wizard->name = $request->name;
        $wizard->email = $request->email;
        $wizard->type = $request->type;
        $wizard->save();
        return redirect('/Wizard')->with('status', 'Data inserted');
	}

    public function NameData(Request $request) 
	{
        // $selectedValue = $request->input('selectedValue');
        $selectedValue = $request->input('selectedValue');

        // Perform a query to fetch data based on $selectedValue
        $data = Wizard_Model::where('name', $selectedValue)->first();

        return response()->json($data);
    }

    public function Edit($name)
    {
        // $data = Wizard_Model::findOrFail($id);
        $data = Wizard_Model::where('name', $name)->first();
        // print_r($data);exit;
        return response()->json(['data' => $data]);
    }

    public function DownloadPDF($name)
    {
        $data = Wizard_Model::where('name', $name)->first();
        $data_json = json_decode($data);
        // echo "<pre>";
        // print_r($data_json);exit;
        // $data_json1 = json_encode($data_json);
        
        $currentYear = date('Y'); // Get the current year (e.g., 2023)
        $nextYear = $currentYear + 1; // Calculate the next year (e.g., 2024)
        $Id = $data_json->id;        
        
        // Create the financial year string in the format "YYYY-YY"
        $financialYear = $currentYear . '-' . substr($nextYear, -2);
        
        // Output the financial year
        $FinalYear = "$financialYear/$Id";

        // Path to the existing PDF file you want to import
        $existingPdfPath = public_path('Wizard_PDf.pdf');

        // Create a new instance of FPDI
        $pdf = new Fpdi();

        // Add a page from the existing PDF
        // $pdf->AddPage();
        $pdf->AddPage('P', [290, 350]); // PDF Size with starting Page
        $pdf->setSourceFile($existingPdfPath);

        $importedPage = $pdf->importPage(1); // You can specify the page number to import

        // Use the imported page as a template
        $pdf->useTemplate($importedPage);

        // Add some text to the imported page
        $pdf->SetFont('Arial', '', 14);
        $pdf->SetTextColor(0, 0, 0); // Black color

        // Form No
        $pdf->SetXY(220, 67); // Set the position
        $pdf->Cell(0, 10,$FinalYear , 0, 1, 'L'); // Add text

        // Date
        $date = date('d/m/Y');
        $pdf->SetXY(35, 67); // Set the position
        $pdf->Cell(0, 10,$date , 0, 1, 'L'); // Add text
        
        // Name
        $pdf->SetXY(145, 87); // Set the position
        $pdf->Cell(0, 10,$data_json->name , 0, 1, 'L'); 

        // Code
        $pdf->SetXY(60, 132); // Set the position
        $pdf->Cell(0, 10,$data_json->code , 0, 1, 'L'); 
        
        // Email
        $pdf->SetXY(45, 154); // Set the position
        $pdf->Cell(0, 10,$data_json->email , 0, 1, 'L');
        
        // Type
        $pdf->SetXY(220, 131); // Set the position
        $pdf->Cell(0, 10,$data_json->type , 0, 1, 'L'); 

        // Code generate in word 
        $name = $data_json->code;
        $formatter = new NumberFormatter('en', NumberFormatter::SPELLOUT);
        $clientWord = $formatter->format($name);
        $pdf->SetXY(50, 115.5); // Set the position
        $pdf->Cell(0, 10,$clientWord , 0, 1, 'L'); 

        // Save the modified PDF as a new file
        // $outputPdfPath = public_path('modified.pdf');
        $outputPdfPath = $data_json->name.'_Wizard.pdf';
        // For View
        // $pdf->Output($outputPdfPath, 'F');
        // return response()->file($outputPdfPath);

        // For Download
        $pdf->Output($outputPdfPath, 'D');
    }

    // public function DateWiseData()
    // {
    //     return view('display_data_date');
    // }

    // public function getData(Request $request)
    // public function DateWiseData(Request $request)
    // {
    //     // if(isset($_POST['submit_btn']))
    //     // {
    //         // print_r($request);exit;
    //         $request->validate([
    //             'fromDate' => 'required|date',
    //             'toDate' => 'required|date',
    //         ]);
    //         // $request->validate([
    //         //     'fromDate' => 'required|date_format:m/d/Y',
    //         //     'toDate' => 'required|date_format:m/d/Y',
    //         // ]);
    //         $fromDate = $request->input('fromDate');
    //         $toDate = $request->input('toDate');


    //         // $data = Wizard_Model::whereBetween('created_at', [$fromDate, $toDate])->get();
    //         $data = Wizard_Model::all();
            
    //         // print_r($data);exit;

    //         // return response()->json(['data' => $data]);
    //         return view('display_data_date',compact('data'));
    //     // }
    // }

}
