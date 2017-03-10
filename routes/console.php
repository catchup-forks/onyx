<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('init:models', function () {
	$this->comment('Creating model class files..');
    $tables = \DB::select('SHOW TABLES;');
	foreach($tables as &$table){
		if($table->Tables_in_onyx == 'users')
			continue;
		$class = 'Models/'.studly_case(str_singular($table->Tables_in_onyx));
		Artisan::call('make:model', ['name' => $class]);
		$this->info("Model $class has been created..");
    }
    $this->comment('All model classes have been created successfully.');
})->describe('Creating bare model class files from database tables');
