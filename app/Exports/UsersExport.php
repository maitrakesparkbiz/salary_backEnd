<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromView,WithColumnFormatting,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        $T1 = User::first();
        $table_columns = array_keys(json_decode($T1, true));
        return view('exports', [
            'User' => User::all(),'table_columns' => $table_columns
        ]);
    }
    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling an entire column.
            1  => ['font' => ['size' => 26]],
        ];
    }
}
