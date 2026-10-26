<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Place;
use App\Repository\MeasurementRepository;

final class WeatherController extends AbstractController
{
    #[Route('/weather/{Locality:place}/{Country:place}', name: 'app_weather')]
    public function locality(Place $place, MeasurementRepository $repository): Response
    {

        $measurements = $repository->findByPlace($place);
        return $this->render('weather/locality.html.twig', [
            'controller_name' => 'WeatherController',

            'place' => $place,
            'measurements' => $measurements,
        ]);
    }
}

