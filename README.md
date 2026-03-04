# Squire - Italian localization

This package aims to group all the Italian localizations for [Squire].

To install specific localization packages, please install the model package from
[Squire] then install what you need from this separately.

|   Model   | Installation command                               |
|:---------:|----------------------------------------------------|
| Continent | `composer require squirephp-italian/continents-it` |
|  Country  | `composer require squirephp-italian/countries-it`  |

## Additional data provided by this package

### Continents

|   Field name    | Description                                                                                    |
|:---------------:|------------------------------------------------------------------------------------------------|
| `it_istat_code` | ISTAT code of the Continent, consisting of a single numeric character, valid in the range 1–5. |

This data is accessible via the `itData()` relation on the `Squire\Models\Continent` model.

### Countries

|   Field name    | Description                                                                                                                                                                                                                     |
|:---------------:|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `it_istat_code` | ISTAT code identifying the State/Territory, consisting of three numeric characters, valid in the range 201–799 for States, with the exception of Italy coded as “100”, and 901–997 for Territories.                             |
|  `it_min_code`  | Identification code of the State/Territory issued by the Italian Ministry of the Interior for the purposes of the National Registry of Resident Population (ANPR).                                                              |
|  `it_at_code`   | Code assigned by the Italian Revenue Agency to the State/Territory, consisting of four characters: the first is alphabetical (Z) and the remaining three are numeric. The Agency does not provide a code for the State "Italy." |

This data is accessible via the `itData()` relation on the `Squire\Models\Country`
model or directly via the `Squire\Models\ItCountryData` model.

# Contributions

We are open to contributions, and we hope you can join us on the localization process
of [Squire] for the Italian language.

All Italian developers know how difficult it is to find up-to-date and reliable 
geopolitical localizations in Laravel & PHP ecosystem (and others), so please, be
part of this package!

[Squire]: https://github.com/squirephp/squire
