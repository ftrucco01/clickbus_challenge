<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\CurrencyConversionRepository;
use App\Entity\Conversion;

class IndexController extends AbstractController
{
    private $currencyConversionRepository;

    public function __construct(CurrencyConversionRepository $CurrencyConversionRepository)
    {
        $this->currencyConversionRepository = $CurrencyConversionRepository;
    }

    /**
     * @Route("/", name="converter")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * @Route("/historical", name="historical")
     */
    public function historical(): Response
    {
        return $this->render('historical.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * @Route("/historical/save", name="historical_save")
     */
    public function historicalSave(): Response
    {
        $currencyConversion = new Conversion();

        $currencyConversion->setQuantity(100);
        $currencyConversion->setSourceCurrency('USD');
        $currencyConversion->setTargetCurrency('EUR');
        $currencyConversion->setAmountConverted(90.22);
        $currencyConversion->setCreationDate(new \DateTime());

        $this->currencyConversionRepository->save($currencyConversion);

        return new Response('Historical data saved successfully', Response::HTTP_OK);
    }

}