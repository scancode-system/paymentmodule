<tr>
	<td class="align-middle">{{ $payment->description }}</td>
	<td class="align-middle">@currency($payment->min_value)</td>
	<td class="align-middle">@percentage($payment->discount)</td>
	<td class="align-middle">@percentage($payment->addition)</td>
	<td class="text-right align-middle">
		<div class="btn-group" role="group" aria-label="Basic example">
			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#payments_view_1"><i class="fa fa-eye"></i></button>
			<a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#payments_destroy_{{ $payment->id }}"><i class="fa fa-trash-o"></i></button>
		</div>
	</td>
	@include('payment::modals.modal_view_payments')
	@modal_destroy(['route_destroy' => 'payments.destroy', 'model' => $payment, 'modal_id' => 'payments_destroy_'.$payment->id])
</tr>