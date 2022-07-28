<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use View;
use Smalot\PdfParser\Parser;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\PdfToText\Pdf;

class ExcelController extends Controller
{
    public function Export()
    {

        return Excel::download(new UsersExport, 'invoices.xlsx');
    }
    public function index()
    {
        return View::make('import');
    }
    public function Import(Request $request)
    { $file = $request->file;

        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);

        // use of pdf parser to read content from pdf
        $fileExtention = $file->getClientOriginalExtension();
        if($fileExtention!='pdf')
        {
            Excel::import(new UsersImport,request()->file('file'));
            return back();
//        $data=Excel::toArray(new UsersImport,request()->file('file'));
//        dd($data);
        }
        else{
            return(new Pdf())
                ->setPdf($file->path())
                ->setOptions(['layout', 'r 96'])
                ->addOptions(['f 1'])
                ->text();
            $config = new \Smalot\PdfParser\Config();
            $config->setHorizontalOffset("");
            $pdfParser = new Parser([],$config);
            $pdf = $pdfParser->parseFile($file->path());
            dd($content = $pdf->getText());

        }
    }

    public function test(){
        return "asd";
    }
}
