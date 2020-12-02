<?php


namespace App\Controller\front;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CurrentMoviesController extends AbstractController
{
    /**
     * @Route("/currentMovies", name="currentMovies_list")
     */

    public function currentMoviesList()
    {
        return $this->render('front/currentMovies.html.twig');
    }

    /**
     * @Route("/currentMovieShow", name="currentMovie_show")
     */

    public function currentMovieShow()
    {
        return $this->render('front/movie.html.twig');
    }

}