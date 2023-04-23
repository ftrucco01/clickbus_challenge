<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CurrencyConversionRepository;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ConversorController extends AbstractController
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
            'conversions' => $this->currencyConversionRepository->list()
        ]);
    }

    /**
     * @Route("/historical/save", name="historical_save")
     * @Method("POST")
     */
    public function historicalSave( Request $request ): Response
    {
        $this->currencyConversionRepository->save($request);

        return new Response('Historical data saved successfully', Response::HTTP_OK);
    }

}