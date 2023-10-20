<?
use Illuminate\Support\Facades\Storage;

//create pdf document
$pdf = app('Fpdf');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');

//save file
Storage::put($pdf->Output('S'));
?>

{{-- Download F
    View 
    --}}