<?php

namespace Squire;

use Illuminate\Support\ServiceProvider;
use Squire\Models\Continent;
use Squire\Models\ItContinentData;

class ContinentsItServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Continent::class, 'it', __DIR__ . '/../resources/data.csv');
        Repository::registerSource(ItContinentData::class, 'it', __DIR__ . '/../resources/it_data.csv');

        Continent::resolveRelationUsing('itData', function (Continent $continentModel) {
            $continentModel->hasOne(ItContinentData::class, 'continent_id', 'id');
        });
    }
}
