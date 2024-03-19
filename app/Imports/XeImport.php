<?php

namespace App\Imports;

use App\Models\Xe;
use Maatwebsite\Excel\Concerns\ToModel;

class XeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|Xe
    */
    public function model(array $row): Xe
    {
        return new Xe([
           'ma_xe' => $row[0],
        ]);
    }
}
