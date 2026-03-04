<?php

namespace Squire;

use Squire\Models\Country;
use Illuminate\Support\ServiceProvider;
use Squire\Models\ItCountryData;

class CountriesItServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Repository::registerSource(Country::class, 'it', __DIR__ . '/../resources/data.csv');
        Repository::registerSource(ItCountryData::class, 'it', __DIR__ . '/../resources/it_data.csv');

        Country::resolveRelationUsing('itData', function (Country $countryModel) {
            $countryModel->hasOne(ItCountryData::class, 'country_id', 'id');
        });
    }
}
