<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="news_list")
     */

    public function newsList()
    {
        return $this->render('front/news.html.twig');
    }

    /**
     * @Route("/new/{id}", name="new_show")
     */

    public function newShow()
    {
        dd("Mon actualité");
    }
}