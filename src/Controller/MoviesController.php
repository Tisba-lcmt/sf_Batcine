<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    /**
     * @Route("movies", name="movies_list")
     */

    public function moviesList()
    {
        dump("Films à l'affiche");

        dd("Films prochainement");
    }

    /**
     * @Route("/currentMovies", name="currentMovies_list")
     */

    public function currentMoviesList()
    {
        dd("Films actuels");
    }

    /**
     * @Route("currentMovieShow", name="currentMovies_show")
     */

    public function currentMovieShow()
    {
        dd("Mon film");
    }
}