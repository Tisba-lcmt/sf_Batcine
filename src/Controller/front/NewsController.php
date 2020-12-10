<?php


namespace App\Controller\front;


use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="news_list")
     * @param NewsRepository $newsRepository
     * @return Response
     */

    public function newsList(NewsRepository $newsRepository)
    {
        $news = $newsRepository->findBy([],['publicationDate' => 'DESC']);

        return $this->render('front/news.html.twig', [
            'news' => $news
        ]);
    }

    /**
     * @Route("/new/show/{id}", name="new_show")
     * @param $id
     * @param NewsRepository $newsRepository
     * @return Response
     */

    public function newShow($id, NewsRepository $newsRepository)
    {
        $news = $newsRepository->find($id);

        return $this->render('front/new.html.twig', [
           'new' => $news
        ]);
    }
}