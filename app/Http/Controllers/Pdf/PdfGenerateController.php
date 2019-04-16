<?php

namespace App\Http\Controllers\Pdf;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\User;
class PdfGenerateController extends Controller
{
    public function pdfview(Request $request)
    {
        $users = User::all();
        view()->share('users',$users);

        if($request->has('download')){
        	// Set extra option
        	PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        	// pass view file
            $pdf = PDF::loadView('pdf.pdfview');
            // download pdf
            return $pdf->download('pdfview.pdf');
        }
        return view('pdf.pdfview');
    }
}
