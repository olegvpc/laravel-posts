<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TestController extends Controller
{
    public function __construct()
        {
        //    $this->middleware('token');
            $this->middleware(['throttle:10']); // 429 TOO MANY REQUESTS - alias
        }
    public function __invoke()
        {

					// return "Test controller from app/Yttp/Controllers/TestController.php";

					// $response = app()->make('response');
					// $response = response('One-two');
					// // $response = Response::make('Hello');
					// dd($response);

					// return response('ответ первым аргументом, вторым: статус ответа, третьим- загооловки', 200, [
					// 	'foo'=>'bar'
					// ]);

					$data = ['foo'=>'bar'];
					return response()->json($data, 200, []);
        }
};
