<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Post eloquent model
class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body'];

    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) {
                $query->where('title', 'like', '%' . $search . '%')
                ->orwhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filter['category'] ?? false, function ($query, $category) {
            $query->whereHas('Category', function ($query) {
                $query->where('slug', $category);
            });
        });

        $query->when($filter['author'] ?? false, function ($query, $author) {
            $query->whereHas('Author', function ($query) {
                $query->where('username', $author);
            });
        });
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
