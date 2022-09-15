<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Category extends Model
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
    public function category_news()
    {
        return $this->belongsTo(Newslatter::class, 'category_id', 'id');
    }
}
