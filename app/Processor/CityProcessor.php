<?php

declare(strict_types=1);

namespace App\Processor;

use App\Models\City;
use Talovskiy\SimpleGeoIp\Service\CityService;

class CityProcessor
{
    private CityService $service;

    public function __construct(CityService $service)
    {
        $this->service = $service;
    }

    public function findCityByIp(): ?City
    {
        $locationData = $this->service->getData(\config('simple-geo-ip.ip.kemerovo'));
        if ($locationData !== null) {
            return City::where('name', $locationData->getRaw()['city']['names']['ru'])->first();
        }

        return City::find(City::CITY_KEMEROVO_ID);
    }
}
