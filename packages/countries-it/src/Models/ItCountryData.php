<?php

namespace Squire\Models;

use Squire\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItCountryData extends Model
{
    protected $primaryKey = 'country_id';

    public static array $schema = [
        'country_id' => 'string',
        'istat_code' => 'string',
        'min_code' => 'string',
        'at_code' => 'string',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
