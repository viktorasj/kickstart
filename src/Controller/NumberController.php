<?php

namespace App\Controller;

use App\Services\NumberFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NumberController extends Controller
{

    private $formatedNumber;

    public function index(NumberFormatter $numberFormatter, $number)
    {

        $numberFormatter->formatNumber($number);
        $this->formatedNumber = $numberFormatter->getFormatedNumber();

        return $this->render('home/numbers.html.twig', [
            'formatedNumber' => $this->formatedNumber
        ]);
    }


}
