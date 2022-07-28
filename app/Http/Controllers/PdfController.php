<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function makePdf(){
        $users = User::all();
        $T1 = User::first();
        $table_columns = array_keys(json_decode($T1, true));
        view()->share('users-pdf',$users);
        $pdf = PDF::loadView('users-pdf', ['users' => $users,'table_columns' => $table_columns]);
        return $pdf->download('users.pdf');
    }
}
