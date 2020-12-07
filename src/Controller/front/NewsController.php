<?php


namespace App\Controller\front;


use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="news_list")
     */

    public function newsList(NewsRepository $newsRepository)
    {
        $news = $newsRepository->findAll();

        return $this->render('front/news.html.twig', [
            'news' => $news
        ]);
    }

    /**
     * @Route("/new/show/{id}", name="new_show")
     */

    public function newShow($id, NewsRepository $newsRepository)
    {
        $news = $newsRepository->find($id);

        return $this->render('front/new.html.twig', [
           'new' => $news
        ]);
    }
}