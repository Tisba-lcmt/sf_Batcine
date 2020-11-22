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
        dd("Ma liste d'actualités");
    }

    /**
     * @Route("/new/{id}", name="new_show")
     */

    public function newsShow()
    {
        dd("Mon actualité");
    }
}