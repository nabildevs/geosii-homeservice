<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingTransaction extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public static function generateTrxId()
    {
        $prefix = 'GEOSII' . date('Ymd');

        do {
            $randString = $prefix . mt_rand(10000, 99999);
        } while (self::where('booking_trx_id', $randString)->exists());

        return $randString;
    }

    public function transactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetails::class);
    }
}
