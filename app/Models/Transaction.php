<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Transaction extends Model
{

    public $timestamps = false;
    protected $fillable = [
       'user_id',
      'provider_id',
        'meter_number',
        'amount',
        'created_at'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public $incrementing = false;
    protected $keyType = 'string';
}
