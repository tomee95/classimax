<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'user_id',
        'ad_category_id',
        'type',
        'price',
        'negotiable',
        'description',
        'contact_name',
        'contact_email',
        'contact_phone',
        'location'
    ];

    public function scopeFilter($query, array $filters)
    {

//        dump($filters['search_term'], $filters['search_category'], $filters['search_location']);
        if(isset($filters['search_term'])) {
            $query->where('title', 'like', '%' . request('search_term') . '%')
                ->orWhere('description', 'like', '%' . request('search_term') . '%');
        }

        if(isset($filters['search_category'])) {
            $query->where('ad_category_id', request('search_category'));
        }

        if(isset($filters['search_location'])) {
            $query->where('location', 'like', '%' . request('search_location') . '%');
        }
    }

}
