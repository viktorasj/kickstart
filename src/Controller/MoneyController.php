<?php

namespace App\Controller;

use App\Services\MoneyFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class MoneyController extends Controller
{

    private $Eur;
    private $Usd;

    /**
     * @Route("/money/{number}", name="money")
     * @param MoneyFormatter $moneyFormatter
     * @param $number
     * @return mixed
     */

    public function index(MoneyFormatter $moneyFormatter, $number)
    {

        $this->Eur = $moneyFormatter->formatEur($number);
        $this->Usd = $moneyFormatter->formatUsd($number);


        return $this->render('home/money.html.twig', [
            'Eur' => $this->Eur,
            'Usd' => $this->Usd
        ]);
    }


}
