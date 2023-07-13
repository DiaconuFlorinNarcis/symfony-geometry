<?php

namespace App\Geometry\Controller;

use App\Geometry\DTO\CircleDTO;
use App\Geometry\DTO\TriangleDTO;
use App\Geometry\Service\CircleCalculatorService;
use App\Geometry\Service\TriangleCalculatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MainController extends AbstractController
{
    #[Route('/circle/{r}', name: 'circle')]
    public function circle(float $r, ValidatorInterface $validator): JsonResponse
    {
        $triangleDto = new CircleDTO($r);
        $error = $validator->validate($triangleDto);

        if ($error->count() > 0) {
            return $this->json((string) $error);
        }

        $circleCalculatorService = new CircleCalculatorService($triangleDto);
        return $this->json($circleCalculatorService->getDetails());
    }

    #[Route('/triangle/{a}/{b}/{c}', name: 'triangle')]
    public function triangle(float $a, float $b, float $c, ValidatorInterface $validator): JsonResponse
    {
        $triangleDto = new TriangleDTO($a, $b, $c);
        $error = $validator->validate($triangleDto);

        if ($error->count() > 0) {
            return $this->json((string) $error);
        }

        $triangleCalculatorService = new TriangleCalculatorService($triangleDto);
        return $this->json($triangleCalculatorService->getDetails());
    }
}
