<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movies_list")
     */

    public function moviesList()
    {
        return $this->render('movies.html.twig');
    }

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

    /**
     * @Route("/upcomingMoviesList", name="upcomingMovies_list")
     */

    public function upcomingMoviesList()
    {
        return $this->render('upcomingMovies.html.twig');
    }

    /**
     * @Route("/upcomingMovieShow", name="upcomingMovie_show")
     */

    public function upcomingMovieShow()
    {
        dd("Mon film à venir");
    }
}