<?php

namespace Squire\Models;

use Squire\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItContinentData extends Model
{
    protected $primaryKey = 'continent_id';

    public static array $schema = [
        'continent_id' => 'string',
        'istat_code' => 'string',
    ];

    public function continent(): BelongsTo
    {
        return $this->belongsTo(Continent::class);
    }
}
