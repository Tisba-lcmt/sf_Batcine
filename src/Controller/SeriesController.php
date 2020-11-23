<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SeriesController extends AbstractController
{

    /**
     * @Route("/series", name="series_list")
     */

    public function seriesList()
    {
        dd("Liste de séries");
    }

    /**
     * @Route("/serieShow", name="serie_show")
     */

    public function serieShow()
    {
        dd("Ma série");
    }
}