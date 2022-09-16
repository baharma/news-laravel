<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Descripsion extends Model
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
    public function descripsion_news()
    {
        return $this->belongsTo(Newslatter::class, 'description_id', 'id');
    }
}
