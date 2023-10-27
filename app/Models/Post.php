<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(string[] $array)
 * @method static truncate()
 * @method static latest()
 * @method static paginate(int $int)
 */
class Post extends Model
{
    use HasFactory;

    public $with = ['category', 'author'];

    public function scopeSuperMegaFilter(Builder $query, array $filters): void
    {
        /*
        SELECT posts.*
        FROM posts
        WHERE
            posts.title LIKE '%test%'
            OR posts.excerpt LIKE '%test%'
            OR posts.body LIKE '%test%'
        */
        $query->when($filters['search'] ?? false, function(Builder $query, $search)
        {
            $query
                ->select('posts.*')
                ->where('posts.title', 'LIKE', '%' . $search . '%')
                ->orWhere('posts.excerpt', 'LIKE', '%' . $search . '%')
                ->orWhere('posts.body', 'LIKE', '%' . $search . '%')
                ->get();
        });

        /*
        Rewrite MySQL query in Laravel Eloquent:
        SELECT posts.*
        FROM posts
        LEFT JOIN categories
            ON posts.category_id = categories.id
        WHERE categories.slug = 'test-slug'
        */
        $query->when($filters['category'] ?? false, function(Builder $query, $category)
        {
            $query
                ->select('posts.*')
                ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
                ->where('categories.slug', $category)
                ->get();
        });

        /*
        SELECT posts.*
        FROM posts
        LEFT JOIN users
            ON posts.user_id = users.id
        WHERE users.username = 'user-name'
        */
        $query->when($filters['author'] ?? false, function(Builder $query, $author)
        {
            $query
                ->select('posts.*')
                ->leftJoin('users', 'posts.user_id', '=', 'users.id')
                ->where('users.username', $author)
                ->get();
        });
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
