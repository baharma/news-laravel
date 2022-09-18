<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use App\Newslatter;

class Descripsion extends Model
{
    protected $fillable = [];
    protected $guarded = [];
    protected $casts = [
        'id' => 'string'
    ];
    protected $hidden = [];
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
        return $this->hasMany(Newslatter::class, 'id', 'description_id');
    }
}
