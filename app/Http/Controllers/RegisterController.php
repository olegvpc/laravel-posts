<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
   public function index()
   {
      //   return "REGISTER SITE";
      // return app('view')->make('register.index')
      // return view()->make('register.index')
      // return View::make('register.index');
      return view('register.index');
   }
	 public function store(Request $request)
	 {
		// dd(app()->make('request'));
		// dd(app('request'));
		// $request = request();

		// dd($request);

		$data = $request->all();
		// тема - получение даннных из объекта $request

		// $data = $request->only(['first-name', 'email']);
		// $data = $request->except(['password-confirmation', '_token']);
		// $name = $request->input('first-name');
		// $email = $request->input('email');
		// $password = $request->input('password');

		// $agreement = $request->boolean('agreement');
		// $checkbox = !! $request->input('remember');
		// ИЛИ
		// $checkbox = $request->boolean('remember');
		// $agreement = $request->has('agreement');
		// $avatar = $request->file('avatar')

		// dd($data, $name, $email, $password, $agreement);

		// if(true){
		// 	return redirect()->back()->withInput();
		// }

		// тема - Запись данных в БД
			$validated = $request->validate([
				'first_name' => ['required', 'string', 'max:50'],
				'email' => ['required', 'string', 'max:50', 'email', 'unique:users,email'], // проверка что в базе нет такого e-mail
				'password' => ['required', 'string', 'min:5', 'max:50', 'confirmed'], // проверка пароля и сравнение его с password_confirmation
				'agreement' => ['accepted'], // true/1/yes
			]);

			// dd($validated);

			// 1-й способ записи данных - через экземпляр класса модели
			// $user = new User;

			// $user->name = $validated['first_name'];
			// $user->email = $validated['email'];
			// $user->password = bcrypt($validated['password']);

			// $user->save();
			// 2-й способ записи данных - через свойство Фасада - ОСНОВНОЙ
			$user = User::query()->create([
				'name' =>  $validated['first_name'],
				'email' => $validated['email'],
				'password' => bcrypt($validated['password']),
			]);
			// $user = User::query()->create(
			// 	array_merge($validated, [
			// 		'name'=> $validated['first_name'],
			// 		'password' => bcrypt($validated['password'])
			// 	]));


			// 3-й способ записи данных - через класс Модели прямо в конструктор
			// $user = new User([
			// 	'name' => $validated['first_name'],
			// 	// 'email' => $validated['email'],
			// ]);
			// $user->email = $validated['email'];
			// $user->fill(['admin' => true]);
			// $user->setAttribute('password', bcrypt($validated['password']));

			// $user->save();
			// dd($user->toArray());
			// return "REGISTER STORE";
			alert(__('Регистрация выполнена!'), 'success');
			return redirect()->route('user');
	 }
}
