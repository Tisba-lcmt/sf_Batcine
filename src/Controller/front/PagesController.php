<?php


namespace App\Controller\front;


use App\Repository\MediaRepository;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

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
        //Je récupere mes deux dernieres actus
        $lastNews = $newsRepository->findBy([], ['publicationDate' => 'DESC'], 2, null);

        //je définie la date d'aujourdhui
        $now = new \DateTime('now');

        //je recupe mes films ( les plus récents )
        $movies = $mediaRepository->findBy([], ['releaseDate' => 'DESC'], null, null);

        //je déclare mes array
        $currentMovies = [];

        $upComingMovies = [];

        //je trie a chaque boucle le film par rapport a la date d'ajourdhui
        foreach ($movies as $movie)
        {
            if($movie->getReleaseDate() < $now)
            {
               $currentMovies[] = $movie;
            }else{
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