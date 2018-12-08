<?php

namespace App\Controller;

use App\Services\NumberFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class NumberController extends Controller
{

    private $formatedNumber;

    /**
     * @Route("/number/{number}", name="numbers")
     * @param NumberFormatter $numberFormatter
     * @param $number
     * @return mixed
     */
    public function index(NumberFormatter $numberFormatter, $number)
    {

        $this->formatedNumber = $numberFormatter->formatNumber($number);


        return $this->render('home/numbers.html.twig', [
            'formatedNumber' => $this->formatedNumber
        ]);
    }


}
