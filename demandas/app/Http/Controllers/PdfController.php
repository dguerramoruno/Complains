<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Denuncia;
class PdfController extends Controller
{
    public function exportToPdf()
    {
        $userId = auth()->user()->expedient;
        $denuncia = Denuncia::find($userId);
        $data = $denuncia->toArray();
        $pdf = PDF::loadView('denuncia.pdfDenuncia', ['data' => $data]);
        return $pdf->download('table.pdf');
    }
}