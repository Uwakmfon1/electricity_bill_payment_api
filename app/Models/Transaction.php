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
    protected $hidden=['meter_number'];
    protected $appends = ['masked_meter_number'];
    /**
     * Accessor to mask the meter number.
     *
     * @return string
     */
    public function getMaskedMeterNumberAttribute()
    {
        // Retrieve the meter number from attributes
        $meterNumber = $this->attributes['meter_number'];

        // Mask all digits except the last 4 digits
        return str_repeat('*', strlen($meterNumber) - 4) . substr($meterNumber, -4);
    }
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
