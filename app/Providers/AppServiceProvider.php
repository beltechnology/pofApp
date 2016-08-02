<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Illuminate\Http\Response;
use View;
use Session;
use Illuminate\Routing\Controller;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view)
		{
			$designation =  DB::table('employees')->where('entityId',session()->get('userEntityId'))->value('designation');
			$articles =  DB::table('usermodule')
							->join('module_configs','module_configs.id','=','usermodule.moduleId')
							->where('usermodule.designationId',$designation)
							->where('usermodule.active','Y')
							->orderBy('module_configs.title','asc')
							->get();
			$view->with('articles', $articles);
		});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
