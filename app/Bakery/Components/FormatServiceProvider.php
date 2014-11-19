<?php

namespace Bakery\Components;

use Illuminate\Support\ServiceProvider;

class FormatServiceProvider extends ServiceProvider {


	public function register()
	{
		$this->app['format'] = $this->app->share(function()
			{
			    return new \Bakery\Components\Convert;
			});
	}
}



