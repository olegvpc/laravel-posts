<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function index()
   {
			// ТЕСТОВЫЙ МАССИВ С ПОСТАМИ
			// $post = (object)[
			// 	'id'=>123,
			// 	'title'=>'Lorem ipsum dolor sit amet.',
			// 	'content'=>'Lorem ipsum <strong>dolor</strong> sit, amet consectetur adipisicing elit. Praesentium, sequi.',
			// 	// 'getID'=> protected function()
			// 	// {
			// 	//     return $this->id;
			// 	// },
			// ];

			// $posts = array_fill(0, 10, $post);
				// $posts = Post::query()->latest()->paginate(12);
				$posts = Post::query()->orderBy('id', 'desc')->paginate(12);
				// dd($posts);

				// return "Site USER with all posts";
				return view('user.posts.index', compact('posts'));
   }

    public function create()
   {
			// return "Site USER for creating post";
		return view('user.posts.create');
   }

    public function show($post_id)
   {
//        return 'Site showing current post- {$id}'; //  Site showing current post- {$id}
        // return "Site USER showing current post- posts/{post}  {$id}"; //  Site showing current post- 123
				// $post = (object)[
				// 	'id'=>123,
				// 	'title'=>'Lorem ipsum dolor sit amet.',
				// 	'content'=>'Lorem ipsum <strong>dolor</strong> sit, amet consectetur adipisicing elit. Praesentium, sequi.',
				// ];
				$post = Post::query()->find($post_id);
				// dd($post, $post_id);

				return view('user.posts.show', compact('post'));
   }
    public function update(Request $request, $post_id)
   {
				$title = $request->input('title');
				$content = $request->input('content');
				// dd($title, $content);
        // return "Site USER update post posts/{post} -PUT | PATCH  -{$post}";

				// return redirect()->route('user.posts.show', $post_id);
				$validator = validate($request->all(), [
					'title' => ['required', 'string', 'max:100'],
					'content' => ['required', 'string', 'max:10000']
				]);


				alert(__('Пост обновлен!'), 'primary');

				return redirect()->back();
   }

	 public function edit(Request $request, $post)
   {
		$post = (object)[
			'id'=>123,
			'title'=>'Lorem ipsum dolor sit amet.',
			'content'=>'Lorem ipsum <strong>dolor</strong> sit, amet consectetur adipisicing elit. Praesentium, sequi.',
		];
        // return "Site USER editing post posts/{post}/edit  - method GET - {$id}";
				return view('user.posts.edit', compact('post'));
   }

	 public function store(Request $request)
   {
			// $title = $request->input('title');
			// $content = $request->input('content');
			// dd($request->all()); // ['title'=> '', 'content' => '']
			// dd($title, $content);
			// return "Site USER creating-saving post - mrthod POST";

			// $validator = validator($request->all(), [
			// 	'title' => ['required', 'string', 'max:100'],
			// 	'content' => ['required', 'string', 'max:10000']
			// ])->validate();
			// $validated = $validator->validate();

			// 1- Но у $request есть метод validate - СОКРАЩАЕМ ЗАПИСЬ

			// $validator = $request->validate([
			// 	'title' => ['required', 'string', 'max:100'],
			// 	'content' => ['required', 'string', 'max:10000']
			// ]);

			//  2- СОЗДАЕМ ОТДЕЛЬНУЮ ФОРМУ ВАЛИДАЦИИ php artisan make:request Post/StorePostRequest
			// $validator = $request->validated();

			// 3 - через создание собственной функции-хелперс validate()
			$validated = validate($request->all(), [
					'title' => ['required', 'string', 'max:100'],
					'content' => ['required', 'string', 'max:10000'],
					'published_at' => ['nullable', 'string', 'date'],
					'published' => ['nullable', 'boolean'],

				]);


			// 4 сообщение об ошибке через сессию

			// if(true) {
			// 	// return redirect()->back()->withInput()->with('message', __("нет средств"));
			// 	// вместо длинной записи  c передачей данных через сессию- можно бросить Excception

			// 	throw ValidationException::withMessages([
			// 		'account' => __("нет средств")
			// 	]);
			// }

			$post = Post::query()->firstOrCreate([
				// 'user_id' => Auth::id(),
				'user_id' => User::query()->value('id'), // первого попавшего юзера
				'title' => $validated['title'],
			],
			[
				'content' => $validated['content'],
				'published_at' => new Carbon($validated['published_at']?? null),
				'published' => $validated['published'] ?? false,
			]);
			// dd($validated);
			// dd($post->toArray());

			if($post->title === $validated['title']) {
				alert(__("Создан новый пост $post->id!"), 'primary');
			}
			return redirect()->route('user.posts.show', $post->id);
   }

    public function destroy($post)
   {
        // return "Site USER destroing post - method DELETE - {$post}";
				return redirect()->route('user.posts');
   }

    public function like()
   {
        return "USER Like + 1";
   }
}
