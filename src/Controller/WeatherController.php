<?php

namespace App\Controller;

use App\Service\WeatherUtil;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Place;


final class WeatherController extends AbstractController
{
    #[Route('/weather/{Locality:place}/{Country:place}', name: 'app_weather')]
    public function locality(Place $place,

        WeatherUtil $util,
    ): Response
    {

          $measurements = $util->getWeatherForPlace($place);
        return $this->render('weather/locality.html.twig', [
            'controller_name' => 'WeatherController',

            'place' => $place,
            'measurements' => $measurements,
        ]);
    }
}


