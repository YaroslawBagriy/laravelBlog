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
            $query->where('title', 'like', '%' . $search . '%')
            ->orwhere('body', 'like', '%' . $search . '%');
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
