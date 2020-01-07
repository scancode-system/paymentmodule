<?php

namespace Modules\Payment\Services;

use Modules\Payment\Imports\PaymentsImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportService {

    public function import($path)
    {
    	Excel::import(new PaymentsImport, $path);
    }

}