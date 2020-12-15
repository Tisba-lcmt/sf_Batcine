<?php


namespace App\Controller\front;


use App\Repository\MediaRepository;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{

    /**
     * @Route("/", name="homepage")
     * @param NewsRepository $newsRepository
     * @param MediaRepository $mediaRepository
     * @return Response
     */

    public function home(NewsRepository $newsRepository, MediaRepository $mediaRepository)
    {

        // J'effectue une requête select en bdd pour récupérer mes 2 actualités
        // les plus récentes (dernières actus) et je stock le résultat dans la variable $lastNews.

        // Cette méthode limit permet de ne pas récupérer toutes mes actu pour en prendre que 2.
        $lastNews = $newsRepository->findBy([], ['publicationDate' => 'ASC'], 2, null);

        // Je stock dans une variable $now, la date d'aujourd'hui à l'aide de la classe DateTime
        $now = new \DateTime('now');

        // Je récupére mes films les plus récents en fonction de la date de Sortie
        $movies = $mediaRepository->findBy([], ['releaseDate' => 'DESC'], null, null);

        // Je déclare mes différents array pour pouvoir stocker mes résultats
        $currentMovies = [];
        $upComingMovies = [];

        // Je trie à chaque tour de boucle le film par rapport a la date d'ajourd'hui
        foreach ($movies as $movie)
        {
            // Si ma date de Sortie est inférieure à la date d'aujourd'hui
            if($movie->getReleaseDate() < $now)
            {
                // Je la stocke dans la variable film à l'affiche
               $currentMovies[] = $movie;
            }else{
                // Je la stocke dans la variable film prochainement
                $upComingMovies[] = $movie;
            }
        }

       return $this->render('front/home.html.twig', [
           'lastNews' => $lastNews,
           'currentMovies' => $currentMovies,
           'upComingMovies' => $upComingMovies
       ]);
    }

}