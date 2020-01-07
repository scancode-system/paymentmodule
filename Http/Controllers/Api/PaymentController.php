<?php

namespace Modules\Payment\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Payment\Repositories\PaymentRepository;

class PaymentController extends Controller
{

    public function all()
    {
        return PaymentRepository::all();
    }

}
