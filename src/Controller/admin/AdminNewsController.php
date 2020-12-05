<?php


namespace App\Controller\admin;


use App\Entity\News;
use App\Form\NewsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

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

    public function insertNew(
        Request $request,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    )
    {
        $new = new News();
        $form = $this->createForm(NewsType::class, $new);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFile = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFile = $slugger->slug($originalFile);
                $newFile = $safeFile. '-'.uniqid().'.'.$imageFile->guessExtension();
                $imageFile->move(
                    $this->getParameter('images_directory_news'),
                    $newFile
                );

                $new->setImage($newFile);
            }

            $entityManager->persist($new);
            $entityManager->flush();

            return $this->redirectToRoute('admin_news_list');

        }

        $formView = $form->createView();

        return $this->render('admin/insertNews.html.twig', [
            'formView' => $formView
        ]);
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