<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
   {
        return "Site ADMIN with all posts";
   }
    public function create()
   {
        return "Site ADMIN creating post- method GET";
   }
    public function store()
   {
        return "Site ADMIN creating-saving post - mrthod POST";
   }
    public function show($id)
   {
//        return 'Site showing current post- {$id}'; //  Site showing current post- {$id}
        return "Site ADMIN showing current post- posts/{post}  {$id}"; //  Site showing current post- 123
   }
    public function update($id)
   {
        return "Site ADMIN update post posts/{post} -PUT | PATCH - {$id}";
   }
    public function edit($id)
   {
        return "Site ADMIN editing post posts/{post}/edit  - method GET - {$id}";
   }
    public function destroy($id)
   {
        return "Site ADMIN destroing post - method DELETE - {$id}";
   }
    public function like()
   {
        return "ADMIN Like + 1";
   }
}
