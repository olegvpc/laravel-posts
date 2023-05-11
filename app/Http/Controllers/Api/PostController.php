<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    public function index()
   {
        return "Site with all posts";
   }
    public function create()
   {
        return "Site creating post- method GET";
   }
    public function store()
   {
        return "Site creating-saving post - mrthod POST";
   }
    public function show($id)
   {
//        return 'Site showing current post- {$id}'; //  Site showing current post- {$id}
        return "Site showing current post- posts/{post}  {$id}"; //  Site showing current post- 123
   }
    public function update($id)
   {
        return "Site update post posts/{post} -PUT | PATCH - {$id}";
   }
    public function edit($id)
   {
        return "Site editing post posts/{post}/edit  - method GET - {$id}";
   }
    public function destroy($id)
   {
        return "Site destroing post - method DELETE - {$id}";
   }
    public function like()
   {
        return "Like + 1";
   }
	 public function index_generate()
   {
				$count = count(Post::all());
				return view('api.index-generate', compact('count'));
        // return "Генерация данных";
   }

	 public function store_generate(Request $request)
   {
		$count = $request->input('count');
		validate($request->all(), ['nuulable']);

		// dd("GENERATION", $count);
		for($i = 0; $i < (int)$count; $i++ ) {
			$post = Post::query()->create([
				'user_id' => User::query()->value('id'),
				'title' => fake()->sentence(),
				'content' => fake()->paragraph(),
				'published' => true,
				'published_at' => fake()->dateTimeBetween(now()->subYear(), now()),
			]);
		}

		alert(__("Сгененировано $count постов"), 'success');
		// dd(session()->get('alert'), session()->get('alert_status'));
		// dd($post);
		return redirect()->route('indexgenerate');
		// return "Генерация данных";
   }
}
