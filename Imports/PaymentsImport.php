<?php

namespace Modules\Payment\Imports;

use Exception;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Events\BeforeImport;
use Illuminate\Support\Facades\Storage;

use Modules\Payment\Repositories\PaymentRepository;
use Modules\ImportWidget\Services\SessionService;


class PaymentsImport implements OnEachRow, WithHeadingRow, WithEvents
{

	use Importable, RegistersEventListeners;

	private $total_rows;

	public function onRow(Row $row)
	{
		try  
		{
			$data = $this->parse($row->toArray());

			$payment = PaymentRepository::loadByUniqueKeys($data['id'], $data['description']);
			if($payment){
				$payment = PaymentRepository::update($payment, $data);
				SessionService::updated('Payment', 'import', true, 'Pagamento '.$payment->id.' atualizado: '. json_encode($payment->toJson())."\r\n");
			} else {
				$payment = PaymentRepository::store($data);
				SessionService::new('Payment', 'import', true);
			}
		} catch(Exception $e) {
			SessionService::failures('Payment', 'import', true, $e->getMessage()."\r\n");
		}
		SessionService::completed('Payment', 'import', ($row->getRowIndex()/$this->total_rows)*100); 
	}

	private function parse($data)
	{
		return $data;	
	}

	public static function beforeImport(BeforeImport $event)
	{
		$cells = $event->getDelegate()->getActiveSheet()->toArray();
		$import = $event->getConcernable();
		$import->data($cells);
	}

	public function data($cells)
	{
		$this->total_rows = count($cells);
	}

}
