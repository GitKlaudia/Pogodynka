<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\Argument;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Service\WeatherUtil;

#[AsCommand(
    name: 'weather:country_locality',
    description: 'Add a short description for your command',
)]
class WeatherCountryLocalityCommand{

    public function __construct(
        private readonly WeatherUtil $weatherUtil,
    ) {
    }
    public function __invoke(
        SymfonyStyle $io,
        #[Argument('Locality String')] string $locality,
        #[Argument('Country String')] string $countryCode,
    ): int {
        $measurements = $this->weatherUtil->getWeatherForCountryAndLocality($countryCode, $locality);

        if ($measurements === []) {
            $io->warning(sprintf('No measurements found for %s, %s.', $locality, $countryCode));

            return Command::SUCCESS;
        }

        $io->writeln(sprintf('Place: %s, %s', $locality, $countryCode));

        $io->table(
            ['Date', 'Temperature', 'Precipitation', 'Wind', 'Humidity'], array_map(fn($m) => [
                $m->getDate()->format('Y-m-d'),
                $m->getTemperature(),
                $m->getPrecipitation(),
                $m->getWind(),
                $m->getHumidity(),
            ], $measurements));

        return Command::SUCCESS;
    }
}
