<?php

namespace Modules\Payment\Repositories;

use Modules\Payment\Entities\Payment;

class PaymentRepository
{

	// LOAD
	public static function all()
	{
		return Payment::all();
	}

	public static function loadByUniqueKeys($id, $description)
	{
		return Payment::where('id', $id)->orWhere('description', $description)->first();
	}

	public static function list($search = '', $limit = 10){
		$payments =  Payment::where('description', 'like', '%'.$search.'%')->paginate($limit);
		$payments->appends(request()->query());
		return $payments;
	}


	public static function store($values){
		return Payment::create($values);
	}


	public static function update(Payment $payment, $values){
		$payment->update($values);
		return $payment;
	}


	public static function destroy($payment){
		$payment->delete();
	}


	public static function toSelect($value, $description){
		return Payment::pluck($description, $value);
	}


}
