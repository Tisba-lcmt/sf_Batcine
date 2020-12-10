<?php


namespace App\Controller\admin;


use App\Entity\News;
use App\Form\NewsType;
use App\Repository\NewsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class AdminNewsController extends AbstractController
{
    /**
     * @Route("/admin/news", name="admin_news_list")
     * @param NewsRepository $newsRepository
     * @return Response
     */

    public function newsList(NewsRepository $newsRepository)
    {
        $news = $newsRepository->findAll();

        return $this->render('admin/news.html.twig', [
            'news' => $news
        ]);
    }

    /**
     * @Route("/admin/new/insert", name="admin_new_insert")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param SluggerInterface $slugger
     * @return RedirectResponse|Response
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
     * @Route("/admin/new/update/{id}", name="admin_new_update")
     * @param $id
     * @param NewsRepository $newsRepository
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param SluggerInterface $slugger
     * @return RedirectResponse|Response
     */

    public function updateNew(
        $id,
        NewsRepository $newsRepository,
        Request $request,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    )
    {
        $new = $newsRepository->find($id);
        if (is_null($new)) {
            return $this->redirectToRoute('admin_news_list');
        }
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

        return $this->render('/admin/updateNews.html.twig', [
            'formView' => $formView
        ]);
    }

    /**
     * @Route("/admin/new/delete", name="admin_new_delete")
     */

    public function deleteNew()
    {
        return $this->render('/admin/deleteNews.html.twig');
    }

}