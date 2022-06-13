<?php

declare(strict_types=1);

namespace App\Process;

use App\Models\City;
use Talovskiy\SimpleGeoIp\Service\CityService;

class CityProcess
{
    private CityService $service;

    public function __construct(CityService $service)
    {
        $this->service = $service;
    }

    public function findCityByIp(): ?City
    {
        $locationData = $this->service->getData('46.180.151.238')->getRaw();

        return City::where('name', $locationData['city']['names']['ru'])->first();
    }
}
