@extends('dashboard::layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		<i class="fa fa-edit"></i> Pagamento #{{ '1' }}
	</div>
	<div class="card-body">
		@alert_success()
		@include('payment::forms.form')
	</div>
</div>

@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ route('payments.index') }}">Pagamentos</a>
</li>
<li class="breadcrumb-item">
	Editar Pagamento
</li>
@endsection