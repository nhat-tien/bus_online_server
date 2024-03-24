<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use App\Imports\XeImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController
{
    public function import(): void
    {
        // Excel::import(new XeImport(), 'xe.csv');
        Excel::import(new UserImport(), 'users.csv');
    }
}
