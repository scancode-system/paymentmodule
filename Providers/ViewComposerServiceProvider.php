<?php

namespace Modules\Payment\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ViewComposerServiceProvider extends ServiceProvider {

	public function boot() {
		View::composer('payment::index', 'Modules\Payment\Http\ViewComposers\IndexComposer');
		View::composer('payment::edit', 'Modules\Payment\Http\ViewComposers\EditComposer');
	}

	public function register() {
        //
	}

}
