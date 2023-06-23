<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];


    public function scopeFilter($query, array $filter)
    {
        // if($filter['search'] ?? false){
        //    return $query->where('judul', 'like', '%' . $filter['search'] . '%')
        //                 ->orWhere('isi', 'like', '%' . $filter['search'] . '%');
        // }

        $query->when($filter['search'] ?? false, function ($query, $search)
        {
            return $query->where('judul', 'like', '%' . $search . '%')
                         ->orWhere('isi', 'like', '%' . $search . '%');
        });

        $query->when($filter['category'] ?? false, function($query, $category)
        {
            return $query->whereHas('category', function($query) use ($category)
            {
                $query->where('slug', $category);
            });
        });

        $query->when($filter['author'] ?? false, function ($query, $author)
        {
            return $query->whereHas('author', function($query) use ($author)
            {
                $query->where('username', $author);
            });
        });
    }

        public function category(){
            return $this->belongsTo(Category::class);
        }

        public function author()
        {
            return $this->belongsTo(User::class, 'penulis_id');
        }

        public function getRouteKeyName(): string
        {
            return 'slug';
        }

        public function sluggable(): array
        {
            return [
                'slug' => [
                    'source' => 'judul'
                ]
            ];
        }
}
