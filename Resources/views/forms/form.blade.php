@alert_errors()
@if(isset($payment))
{{ Form::model($payment, ['route' => ['payments.update', $payment], 'method' => 'put']) }}
{{ Form::hidden('id', $payment->id) }}
@else
{{ Form::open(['route' => 'payments.store']) }}
@endif
<div class="form-group">
	{{ Form::label('description', 'Descrição') }}
	{{ Form::text('description', old('description'), ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('min_value', 'Valor Mínimo') }}
	{{ Form::number('min_value', old('min_value'), ['class' => 'form-control', 'step' => '0.01']) }}
</div>
<div class="form-group">
	{{ Form::label('discount', 'Desconto') }}
	{{ Form::number('discount', old('descount'), ['class' => 'form-control', 'step' => '0.01']) }}
</div>
<div class="form-group">
	{{ Form::label('addition', 'Acréscimo') }}
	{{ Form::number('addition', old('addition'), ['class' => 'form-control', 'step' => '0.01']) }}
</div>
<div class="form-group  mb-0">
	{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
</div>
{{ Form::close() }}