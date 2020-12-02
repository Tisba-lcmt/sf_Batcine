<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UpcomingMoviesController extends AbstractController
{
    /**
     * @Route("/upcomingMoviesList", name="upcomingMovies_list")
     */

    public function upcomingMoviesList()
    {
        return $this->render('front/upcomingMovies.html.twig');
    }

    /**
     * @Route("/upcomingMovieShow", name="upcomingMovie_show")
     */

    public function upcomingMovieShow()
    {
        dd("Mon film à venir");
    }
}