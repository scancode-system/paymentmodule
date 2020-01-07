<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Payment\Http\Requests\PaymentRequest;
use Modules\Payment\Repositories\PaymentRepository;
use Modules\Payment\Entities\Payment;

class PaymentController extends Controller
{

    public function index(Request $request){
        return view('payment::index');
    }


    public function create()
    {
        return view('payment::create');
    }


    public function store(PaymentRequest $request){
        PaymentRepository::store($request->all());
        return redirect()->route('payments.index')->with('success', 'Pagamento cadastrado.');
    }


    public function edit(Request $request, Payment $payment)
    {
        return view('payment::edit');
    }


    public function update(PaymentRequest $request, Payment $payment){
        PaymentRepository::update($payment, $request->all());
        return redirect()->route('payments.edit', $payment->id)->with('success', 'Pagamento atualizado.');
    }


    public function destroy(Request $request, Payment $payment){
        PaymentRepository::destroy($payment);
        return back()->with('success', 'Pagamento deletado.');
    }

    public function import(Request $request)
    {
        return view('payment::import');
    }

}
