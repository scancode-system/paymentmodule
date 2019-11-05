@modal_view(['modal_id' => 'payments_view_'.$payment->id, 'edit_route' => 'payments.edit', 'model_id' => $payment])

@slot('title')
Pagamento #{{ $payment->id }}
@endslot

<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Descrição: </strong></div>
	<div class="col-md-5">{{ $payment->description }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Valor Mínimo: </strong></div>
	<div class="col-md-5">@currency($payment->min_value)</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Desconto: </strong></div>
	<div class="col-md-5">@percentage($payment->discount)</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-5"><strong>Acréscimo: </strong></div>
	<div class="col-md-5">@percentage($payment->addition)</div>
</div>

@endmodal_view