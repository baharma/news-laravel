<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ImageNews extends Model
{
    protected $guarded = [];
    protected $casts = [
        'id' => 'string'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = Uuid::uuid4();
        });
    }
    public function image_news()
    {
        return $this->hasMany(Newslatter::class, 'image_id', 'id');
    }
}
