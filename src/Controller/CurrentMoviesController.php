<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CurrentMoviesController extends AbstractController
{
    /**
     * @Route("/currentMovies", name="currentMovies_list")
     */

    public function currentMoviesList()
    {
        return $this->render('currentMovies.html.twig');
    }

    /**
     * @Route("/currentMovieShow", name="currentMovie_show")
     */

    public function currentMovieShow()
    {
        return $this->render('movie.html.twig');
    }

}