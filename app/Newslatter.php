<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use app\Descripsion;
use app\Category;
use app\ImageNews;


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
        return $this->hasMany(Descripsion::class, 'description_id', 'id');
    }
    public function category_event()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }
    public function image_event()
    {
        return $this->hasMany(ImageNews::class, 'image_id', 'id');
    }
}
