<?php

declare(strict_types=1);
namespace App\Service;


use App\Entity\Place;
use App\Entity\Measurement;
use App\Repository\PlaceRepository;
use App\Repository\MeasurementRepository;

class WeatherUtil

{
    public function __construct(
        private PlaceRepository $placeRepository,
        private MeasurementRepository $measurementRepository,
    ) {
    }
    /**

     * @return Measurement[]

     */

    public function getWeatherForPlace(Place $place): array

    {


        return $this->measurementRepository->findByPlace($place);

    }



    /**

     * @return Measurement[]

     */

    public function getWeatherForCountryAndLocality(string $countryCode, string $locality): array

    {
        $place = $this->placeRepository->findOneBy([
            'Country' => $countryCode,
            'Locality' => $locality,
        ]);

        return $this->getWeatherForPlace($place);

    }

}
