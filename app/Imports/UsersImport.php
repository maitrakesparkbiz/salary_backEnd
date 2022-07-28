<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToCollection, WithStartRow
{
    public function collection(Collection $rows)
    {
//        return $rows;
        foreach ($rows as $row)
        {
            if($row[0]!="")
            {
                User::updateOrCreate([
                    'id'=>$row[0]
                ],
                    [
                        'name' => $row[1],
                        'email' => $row[2],
                        'password' => $row[4],
                    ]);
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
