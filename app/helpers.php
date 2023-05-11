<?php

use Illuminate\Support\Facades\Route;

if(! function_exists('test')) {
    function test(){
        return app('test');
    }
}

if(! function_exists('active_link')) {
	function active_link(string $name, $active = 'active'): string {
			return Route::is($name) ? $active : '' ;
	}
}
if(! function_exists('alert')) {
	function alert(string $text_alert, $alert_status = 'info') {
		// dd($text_alert, $alert_status);
		session(['alert' => $text_alert, 'alert_status' => $alert_status]);
	}
}

if(! function_exists('validate')) {
	function validate(array $attributes, array $rules): array {

		return validator($attributes, $rules)->validate();
	}
}
;