<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use App\Descripsion;
use App\Category;
use App\ImageNews;
use App\Thumbnail;


class Newslatter extends Model
{
    protected $guarded = [];
    protected $casts = [
        'id' => 'string'
    ];
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = Uuid::uuid4();
        });
    }
    /**
     * Get all of the products for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\
     */

    public function descripsion_event()
    {
        return $this->belongsTo(Descripsion::class, 'description_id');
    }
    public function category_event()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function image_event()
    {
        return $this->belongsTo(ImageNews::class, 'image_id');
    }
}
