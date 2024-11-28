<?php

namespace App\Controller;

use App\DataTable\Type\CarDataTableType;
use App\Repository\CarRepository;
use Kreyu\Bundle\DataTableBundle\DataTableFactoryAwareTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    use DataTableFactoryAwareTrait;

    #[Route('/', name: 'app_car')]
    public function index(Request $request, CarRepository $carRepository): Response
    {
        $queryBuilder = $carRepository->createQueryBuilder('car');
        $dataTable = $this->createDataTable(CarDataTableType::class, $queryBuilder, [
            'themes' => ['data_table_theme.html.twig'],
        ]);

        $dataTable->handleRequest($request);

        return $this->render('car/index.html.twig', [
            'cars' => $dataTable->createView(),
        ]);
    }
}
