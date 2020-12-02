<?php


namespace App\Controller\admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminNewsController extends AbstractController
{
    /**
     * @Route("/admin/news", name="admin_news_list")
     */

    public function newsList()
    {
        return $this->render('admin/news.html.twig');
    }
}