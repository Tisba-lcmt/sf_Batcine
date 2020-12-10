<?php


namespace App\Controller\front;


use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{

    /**
     * @Route("/", name="homepage")
     * @param NewsRepository $newsRepository
     * @return Response
     */

    public function home(NewsRepository $newsRepository)
    {
        $news = $newsRepository->findNewsLimit();

       return $this->render('front/home.html.twig', [
           'news' => $news
       ]);
    }

}