<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Страница ПРОСМОТРА Коммента posts/{post}/comments -method GET";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($post, $comment)
    {
        return "Страница ПРОСМОТРА Коммента posts/{post}/comments/{comment}-  {$comment} поста({$post}) -method GET";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post, $comment)
    {
        return "Страница редактирования Коммента posts/{post}/comments/{comment}/edit-  {$comment} поста({$post}) -method GET";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
