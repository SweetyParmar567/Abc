<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Wizard_Model;


use Illuminate\Http\Request;

class PdfImportController extends BaseController
{
   public function index($id)
   {
      $data = Wizard_Model::findOrFail($id); // Replace with your model
      print_r($data);exit;
      return view('wizard', compact('data'));
   }

   public function update(Request $request, $id)
   {
      // Validation and updating logic here
   }

   // public function index($name)
   // {
   //      $data = Wizard_Model::where('name', $name)->first();
   //      $data_json = json_decode($data);
   //      $data_json1 = json_encode($data_json);
        
   //      $currentYear = date('Y'); // Get the current year (e.g., 2023)
   //      $nextYear = $currentYear + 1; // Calculate the next year (e.g., 2024)
   //      $Id = $data_json->id;
   //      $output = "$nextYear/$Id";
   //      // print_r($data_json);exit;
        
        
   //      // Create the financial year string in the format "YYYY-YY"
   //      $financialYear = $currentYear . '-' . substr($nextYear, -2);
        
   //      // Output the financial year
   //      echo $financialYear; exit;

   //      // Path to the existing PDF file you want to import
   //      $existingPdfPath = public_path('Wizard_PDf.pdf');

   //      // Create a new instance of FPDI
   //      $pdf = new Fpdi();

   //      // Add a page from the existing PDF
   //      // $pdf->AddPage();
   //      $pdf->AddPage('P', [290, 350]);
   //      $pdf->setSourceFile($existingPdfPath);

   //      $importedPage = $pdf->importPage(1); // You can specify the page number to import

   //      // Use the imported page as a template
   //      $pdf->useTemplate($importedPage);

   //      // Add some text to the imported page
   //      $pdf->SetFont('Arial', 'B', 14);
   //      $pdf->SetTextColor(0, 0, 0); // Black color


   //      // Date
   //      $date = date('d/m/Y');
   //      $pdf->SetXY(35, 67); // Set the position
   //      $pdf->Cell(0, 10,$date , 0, 1, 'L'); // Add text
        
   //      // Name
   //      $pdf->SetXY(145, 87); // Set the position
   //      $pdf->Cell(0, 10,$data_json->name , 0, 1, 'L'); 

   //      // Code
   //      $pdf->SetXY(60, 132); // Set the position
   //      $pdf->Cell(0, 10,$data_json->code , 0, 1, 'L'); 
        
   //      // Email
   //      $pdf->SetXY(45, 154); // Set the position
   //      $pdf->Cell(0, 10,$data_json->email , 0, 1, 'L');
        
   //      // Type
   //      $pdf->SetXY(220, 131); // Set the position
   //      $pdf->Cell(0, 10,$data_json->type , 0, 1, 'L'); 

   //      // Code generate in word 
   //      $name = $data_json->code;
   //      $formatter = new NumberFormatter('en', NumberFormatter::SPELLOUT);
   //      $clientWord = $formatter->format($name);
   //      $pdf->SetXY(50, 115.5); // Set the position
   //      $pdf->Cell(0, 10,$clientWord , 0, 1, 'L'); 

   //      // Save the modified PDF as a new file
   //      $outputPdfPath = public_path('modified.pdf');
   //      $pdf->Output($outputPdfPath, 'F');

   //      return response()->file($outputPdfPath);
   // }

}
