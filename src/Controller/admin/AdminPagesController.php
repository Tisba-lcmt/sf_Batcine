<?php


namespace App\Controller\admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminPagesController extends AbstractController
{
    /**
     * @Route("/admin/home", name="admin_homepage")
     */

    public function adminHome()
    {
        return $this->render('admin/home.html.twig');
    }
}