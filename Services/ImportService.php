<?php

namespace Modules\Payment\Services;

use Modules\Payment\Imports\PaymentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ImportService {

	public function import($path)
	{
		if(Storage::exists($path)){
			Excel::import(new PaymentsImport, $path);
		}
	}

}


