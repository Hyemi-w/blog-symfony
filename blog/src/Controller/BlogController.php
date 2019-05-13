<?php
// src/Controller/BlogController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog_index")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'owner' => 'Elodie',
        ]);
    }

    /**
     * @Route("/blog/list/{page<\d+>?1}", name="blog_list")
     */
    public function list($page)
    {
        return $this->render('blog/list.html.twig', ['page' => $page]);
    }
    /**
     * @Route("/blog/show/{slug}", requirements={"slug"="[a-z0-9\-]+"}, name="blog_show")
     */
    public function show($slug = "Article Sans Titre")
    {
        $slug= str_replace('-',' ', $slug);
        $slug = ucwords($slug);
        return $this->render('blog/show.html.twig', ['slug' => $slug]);
    }
}
