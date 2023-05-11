<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isNull;

class BlogController extends Controller
{
    public function index(Request $request)
    {
			// $data = $request->all();
			// $ip = $request->ip();
			// $search = $request->input('search');
			// $category_id = $request->input('category_id');

			// dd($search, $category_id);
			// dd($ip);
        // $posts = [1, 2, 3, 4, 5];

        // $post = (object)[
        //     'id'=>123,
        //     'title'=>'Lorem ipsum dolor sit amet.',
        //     'content'=>'Lorem ipsum <strong>dolor</strong> sit, amet consectetur adipisicing elit. Praesentium, sequi.',
				// 		'category_id'=> 1,
        //     // 'getID'=> protected function()
        //     // {
        //     //     return $this->id;
        //     // },
        // ];

        // $posts = array_fill(0, 10, $post);

				// SELECT * FROM posts

				// $posts = Post::all();

				// фильтрация постов при наличии параметров $search и/ или $category_id в запросе

				// $posts = array_filter($posts->toArray(), function($post) use($search, $category_id) {
				// 	if($search && ! str_contains(strtolower($post->title), strtolower($search))) {
				// 		return false;
				// 	}
				// 	if($category_id && ($post->category_id != $category_id)) {
				// 		return false;
				// 	}
				// 	return true;
				// 	}
				// );
				$categoris = [
					null => __('Все категории'),
					1 => __('Первая категория'),
					2 => __('Вторая категория')
				];

        $foo = 'bar';
        // dd($posts);

        // $currentRoute = Route::is('blog') ? 'Yes' : 'No';
        // return "Посты в Блоге - method GET - {$currentRoute}";

        // ПЕРВЫЙ ВАРИАНТ ПЕРЕДАЧИ КОНТЕНТА НА СТРАНИЦУ ->with()
        //     return view('blog.index')
        //         ->with(['foo'=>'bar'])
        //         ->with(['list'=>[1,2,3,4]]);
        // }
        // Второй вариант ПЕРЕДАЧИ КОНТЕНТА НА СТРАНИЦУ - вторым аргументом - массив
        // return view('blog.index', ['foo'=>'bar', 'list'=>[1,2,3,4], 'posts'=>$posts]);
        // return view('blog.index', compact('posts', 'foo', 'categoris'));

				// ТЕМА ЧТЕНИЕ ДАННЫХ ИЗ БД
				/**
				 * @var Post $post
				 */

				// $post = Post::query()->first();

				// dd($post, $post->getAttribute('title'), $post->id, $post->isPublished());

				// SELECT id, title, published_at FROM posts

				// $posts = Post::all(['id', 'title', 'published_at']);

				// $posts = Post::query()->get(['id', 'title', 'published_at']);

				// $posts = Post::query()->limit(12)->get(['id', 'title', 'published_at']);
				// $posts = Post::query()->limit(12)->offset(12)->get(['id', 'title', 'published_at']);
				// dd($posts, $posts->toArray());

				// ==============PAGINATION=============
				$validated = $request->validate([
					'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
					'page' => ['nullable', 'integer', 'min:1', 'max:100']
				]);

				$limit = $validated['limit'] ?? 12; // если ничего не указано - то 12
				// $page = $validated['page'] ?? 1; // если ничего не указано - то 1

				// $offset = ($page-1) * $limit ;

				// // dd($validated);
				// $posts = Post::query()->limit($limit)->offset($offset)->get(['id', 'title', 'published_at']);

				// $posts = Post::query()->paginate($limit);
				// dd($posts, $posts->lastPage(), $posts->total());

				// СОРТИРОВКА
				// $posts = Post::query()->orderBy('published_at', 'desc')->paginate($limit);
				// $posts = Post::query()->latest('published_at')->paginate($limit);
				$posts = Post::query()->oldest('published_at')->paginate($limit);

				return view('blog.index', compact('posts', 'foo', 'categoris'));

    }
    public function show(Request $request, $post_id)
		// public function show(Request $request, Post $post) // Route Model Binding
    {
        // $currentRoute = Route::is('blog*') ? 'Yes' : 'No';
        // return "Пост в Блоге - {$post} method GET Rout is BLOG? - {$currentRoute}";
        // $post = (object) [
        //     'id'=>123,
        //     'title'=>'Lorem ipsum dolor sit amet.',
        //     'content'=>'Lorem ipsum <strong>dolor</strong> sit, amet consectetur adipisicing elit. Praesentium, sequi.',
        // ];

				// dd($post_id); // 1130

				// ТЕМА - ВЫБОРКА ИЗ БД ОДНОГО ПОСТА - метод first()

				// $post = Post::query()->orderBy('id', 'desc')->first();
				// $post = Post::query()->orderBy('published_at', 'asc')->first(['id', 'title', 'published_at']);

				// тоже самое
				// $post = Post::query()->oldest('published_at')->first(['id', 'title', 'published_at']);
				// $post = Post::query()
				// ->where('user_id', 1234)
				// ->oldest('published_at')
				// ->firstOrFail(['id', 'title', 'published_at']);

				// dd($post);
				// if(isNull($post)){
				// 	abort(404);
				// };

				// ТЕМА - ВЫБОРКА ИЗ БД ОДНОГО ПОСТА - метод find()

				// $post = Post::query()
				// ->find(1003);

				// $post = Post::query()
				// ->find($post_id, ['id', 'title', 'published_at']);

				// $post = Post::query()
				// ->findOrFail($post_id, ['id', 'title', 'published_at']);

				// $post = Post::query()
				// ->findOrFail([1002,1003,1004], ['id', 'title', 'published_at']);

				// dd($post->toArray());
					// ----------------------------------------------------------------------------------------------------------
				// ТЕМА - ВЫБОРКА ИЗ БД ОДНОГО ПОСТА - Route Model Binding - public function show(Request $request, Post $post_id)

				// dd($post);

				// ТЕМА КЭШИРОВАНИЕ данных поста


				$post = cache()->remember(
					key: "posts.{$post_id}",
					ttl: now()->addHour(),
					callback: function() use ($post_id) {
						info('BlogController.show: read post from DB');
					return Post::query()
					->findOrFail($post_id, ['id', 'title', 'published_at']);
				});

				// dd($post, cache("posts.{$post_id}"));

				// ТЕМА работа с кусками базы данных
				// SELECT * FROM posts
				// WHERE published=true
				// LIMIT 10 OFFSET 0
				// Post::query()
				// // ->where('published', true)
				// ->chunk(10, function(Collection $posts) {
				// 	// dump($posts->count());
				// 	info('BlogController.show: edit DataBase');
				// 	foreach($posts as $post) {
				// 		$post->update(['published' => true]);
				// 	}
				// });

				// SELECT * FROM posts
				// WHERE published=true AND id>0
				// LIMIT 10
				Post::query()
				->where('published', true)
				->chunkById(10, function(Collection $posts) {
					// dump($posts->count());
					info('BlogController.show: edit DataBase');
					foreach($posts as $post) {
						$post->update(['published' => false]);
					}
				});
				dd('end');

        return view('blog.show', compact('post'));
    }

    public function like($post)
    {
        return "Лайки на пост - {$post} method POST";
    }
}
