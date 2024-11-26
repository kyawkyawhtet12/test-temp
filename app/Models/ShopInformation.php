<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopInformation extends Model
{
    protected $guarded = [];

    /**
     * Get the user that owns the ShopInformation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
