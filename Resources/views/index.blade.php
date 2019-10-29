@extends('dashboard::layouts.master')

@section('content')

<div class="card">
	@header_search_add(['route_search' => 'payments.index', 'route_add' => 'payments.create'])
	<div class="card-body">
		@alert_success()
		<table class="table table-responsive-sm bg-white table-hover border">
			@include('payment::tables.thead')
			<tbody>
				@each('payment::tables.tr', $payments, 'payment')
			</tbody>
		</table>
		{{ $payments->links() }}
	</div>
</div>

@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">
	Pagamentos
</li>
@endsection
