<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property bool $published
 * @property Carbon $published_at
 */

class Post extends Model
{
    use HasFactory;

		protected $fillable = [
			'user_id',
			'title', 'content',
			'published', 'published_at',
		];

		protected $casts = [
			'published' => 'boolean',
			'published_at' => 'datetime',
		];

		// protected $dates = [
		// 	'published_at',
		// ];

		// ТЕМА ЧТЕНИЕ ДАННЫЗ ИЗ БД
		// Делаем кастомный метод у Класса Модели Post

		public function isPublished(): bool
		 {
			return $this->published && $this->published_at;
		}

}
