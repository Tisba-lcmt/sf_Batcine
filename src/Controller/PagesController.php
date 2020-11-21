<?php


namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;

class PagesController
{

    /**
     * @Route("/", name="homepage")
     */

    public function home()
    {
        dd("Homepage");
    }
}