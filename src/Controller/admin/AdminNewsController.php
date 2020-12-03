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

    /**
     * @Route("/admin/new/insert", name="admin_new_insert")
     */

    public function insertNew()
    {
        return $this->render('admin/insertNews.html.twig');
    }

    /**
     * @Route("/admin/new/update", name="admin_new_update")
     */

    public function updateNew()
    {
        return $this->render('/admin/updateNews.html.twig');
    }

    /**
     * @Route("/admin/new/delete", name="admin_new_delete")
     */

    public function deleteNew()
    {
        return $this->render('/admin/deleteNews.html.twig');
    }

}