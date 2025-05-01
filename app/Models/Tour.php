<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tours';

    protected $fillable = [
        'name', 'duration', 'price', 'departure_date', 'return_date',
        'category_id', 'subcategory_id', 'description',
        'country_id', 'state_id', 'city_id', 'tour_type', 
        'accommodation_type', 'transport_included', 'meals_included',
        'tour_highlights', 'inclusions', 'exclusions',
        'seo_keywords', 'meta_title', 'meta_description',
        'featured_image', 'gallery_images'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
